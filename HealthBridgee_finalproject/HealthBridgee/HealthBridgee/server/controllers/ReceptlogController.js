// const bcrypt = require("bcrypt");
// const { Recept } = require("../models/receptModel");
// // const joi = require("joi");
// // const passwordComplexity = require("joi-password-complexity");

// const ReceptlogController = async (req, res) => {
//   try {
//     const user = await Recept.findOne({ email: req.body.email });
//     if (!user) {
//       return res.status(401).json({ message: "Invalid User or Password" });
//     }
//     const validPassword = await bcrypt.compare(req.body.password, user.password)
//     if (!validPassword) {
//       return res.status(401).json({ message: "Invalid Password" });
//     }
//     res.status(200).json({ data: user, message: "Logged Successfully" });
//   } catch (err) {
//     res.status(500).json({ message: "Login Error" });
//   }
// };

// module.exports = { ReceptlogController };




const bcrypt = require("bcrypt");
const { Recept } = require("../models/receptModel");

const ReceptlogController = async (req, res) => {
  try {
    console.log("Login Request Received for:", req.body.email);

    const user = await Recept.findOne({ email: req.body.email });

    if (!user) {
      console.log("User Not Found:", req.body.email);
      return res.status(401).json({ message: "Invalid User or Password" });
    }

    console.log("Stored Hashed Password:", user.password);
    console.log("Entered Password:", req.body.password);

    const validPassword = await bcrypt.compare(req.body.password, user.password);
    
    console.log("Password Match Result:", validPassword); // Log result

    if (!validPassword) {
      console.log("Invalid Password for:", req.body.email);
      return res.status(401).json({ message: "Invalid Password" });
    }

    console.log("Login Successful for:", req.body.email);
    res.status(200).json({ data: user, message: "Logged Successfully" });

  } catch (err) {
    console.error("Login Error:", err);
    res.status(500).json({ message: "Login Error" });
  }
};

module.exports = { ReceptlogController };
