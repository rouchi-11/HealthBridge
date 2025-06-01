const { Doc } = require('../models/docModel');
const { Pats } = require('../models/patModel');
const { Recept } = require("../models/receptModel");

const billingAmount = async (req, res) => {
    try {
        console.log("Billing Request Body:", req.body);

        const existingPatient = await Pats.findOne({ phno: req.body.patphno });
        if (!existingPatient) {
            return res.status(422).json("Patient is not registered");
        }

        // const doc = await Doc.findOne({ name:req.body.name });
        // if (!doc) {
        //     return res.status(422).json("Doctor is not registered");
        // }

        // Debug: See what names are in the database
            const allDocs = await Doc.find();
            console.log("All Doctors In DB:", allDocs.map(d => d.name));

            // Use a case-insensitive and trimmed match
            const doc = await Doc.findOne({
            name: new RegExp(`^${req.body.name.trim()}$`, 'i'),
            });

            if (!doc) {
            console.log("Doctor Not Found For:", req.body.name);
            return res.status(422).json("Doctor is not registered");
            }


        const updatedReceipt = await Recept.findOneAndUpdate(
            { phno: req.body.phno },
            {
                $push: {
                    doctor: {
                        docObjectId: doc._id,
                        patId: existingPatient._id,
                        amount: req.body.amount,
                    }
                }
            },
            { new: true, upsert: true }
        );

        res.status(200).json({ message: 'Receipt updated successfully', receipt: updatedReceipt });
    } catch (err) {
        console.error(err);
        res.status(500).json("Internal Server Error " + err.message);
    }
};

module.exports = { billingAmount };
