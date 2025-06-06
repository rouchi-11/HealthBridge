import React, { useState } from "react";
import styles from "../../styles/components/SideBar.module.css";
import { NavLink, useNavigate } from "react-router-dom";
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import { faBars, faXmark } from "@fortawesome/free-solid-svg-icons";

function DocSideBar({ name }) {
  const navigate = useNavigate();
  const handleSignOut = (e) => {
    e.preventDefault();
    localStorage.clear();
    navigate("/");
  };
  const [isOpen, setOpen] = useState(false);
  return (
    <>
      <div
        className={`${styles.mobileContainer} ${
          isOpen ? styles.open : styles.hide
        } `}
      >
        <FontAwesomeIcon
          icon={faXmark}
          className={styles.xmark}
          size="2x"
          color="white"
          onClick={() => setOpen(false)}
        />
        <div className={styles.clinicDetails}>
          <h1>HealthBridgee</h1>
        </div>
        <div className={styles.mobContainer}>
        <ul>
              <NavLink
                to="/doc/dash"
                className={({ isActive }) =>
                  isActive ? styles.active : undefined
                }
              >
                <li>
                  <span className={styles.icon}>
                    <span name="home-outline"></span>
                  </span>
                  <h3 className={styles.title}>Dashboard</h3>
                </li>
              </NavLink>

              <NavLink
                to="/doc/pats"
                className={({ isActive }) =>
                  isActive ? styles.active : undefined
                }
              >
                <li>
                  <span className={styles.icon}>
                    <span name="people-outline"></span>
                  </span>
                  <h3 className={styles.title}>Patient Checker</h3>
                </li>
              </NavLink>

              <NavLink
                to="/doc/docinfo"
                className={({ isActive }) =>
                  isActive ? styles.active : undefined
                }
              >
                <li>
                  <span className={styles.icon}>
                    <span name="help-outline"></span>
                  </span>
                  <h3 className={styles.title}>User Info</h3>
                </li>
              </NavLink>
              <li>
                <button
                  className={`${styles.button} ${styles.type1}`}
                  onClick={handleSignOut}
                >
                  <span className={styles.btntxt}>Sign Out</span>
                </button>
              </li>
            </ul>
        </div>
      </div>
      <div>
        <div className={styles.burgerIcon}>
          <FontAwesomeIcon
            size="2x"
            icon={faBars}
            className={`${styles.menu} ${isOpen ? styles.hidden : styles.show}`}
            onClick={() => setOpen(true)}
          />
        </div>
        <div className={styles.container}>
          <div className={styles.clinicDetails}>
            <h1>HealthBridgee</h1>
          </div>
          <div className={styles.navContainer}>
            <ul>
              <NavLink
                to="/doc/dash"
                className={({ isActive }) =>
                  isActive ? styles.active : undefined
                }
              >
                <li>
                  <span className={styles.icon}>
                    <span name="home-outline"></span>
                  </span>
                  <h3 className={styles.title}>Dashboard</h3>
                </li>
              </NavLink>

              <NavLink
                to="/doc/pats"
                className={({ isActive }) =>
                  isActive ? styles.active : undefined
                }
              >
                <li>
                  <span className={styles.icon}>
                    <span name="people-outline"></span>
                  </span>
                  <h3 className={styles.title}>Patient Checker</h3>
                </li>
              </NavLink>

              <NavLink
                to="/doc/docinfo"
                className={({ isActive }) =>
                  isActive ? styles.active : undefined
                }
              >
                <li>
                  <span className={styles.icon}>
                    <span name="help-outline"></span>
                  </span>
                  <h3 className={styles.title}>User Info</h3>
                </li>
              </NavLink>
              <li>
                <button
                  className={`${styles.button} ${styles.type1}`}
                  onClick={handleSignOut}
                >
                  <span className={styles.btntxt}>Sign Out</span>
                </button>
              </li>
            </ul>
          </div>
          <div className={styles.userData}>
            <h2>{name}</h2>
          </div>
        </div>
      </div>
    </>
  );
}

export default DocSideBar;
