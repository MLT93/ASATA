import styles from "./Nav.module.scss";
import { Link } from "../02_Link/Link";
import { Box } from "../05_PageStructure/Box/Box";
import Logo from "../../assets/icons/05_Logo";
import Carrito from "../../assets/icons/04_Carrito";

/**
 *
 * @param {Object} props - Propiedades para renderizar el tipo de texto
 * @param {string} props.any - ToDo Por hacer...
 *
 * @returns {JSX.Element} Elemento | Estructura HTML
 */

const Nav = (): JSX.Element => {
  return (
    <>
      <nav className={styles.nav}>
        <Box
          isFlexRowStart
          textAlign="center"
          alignItems="center"
          paddingLeft="3"
          marginTop="5">
          <Link text={""} href={"/"} svg={<Logo width="7.5" />} />
        </Box>
        <Box
          isFlexRowSpaceBetween
          textAlign="center"
          alignItems="center"
          paddingRight="3"
          marginTop="5">
          <Link
            isAnchorPrimary
            text={"PRODUCTS"}
            href={"/products"}
            onClick={(e) => {
              e.preventDefault();
              console.log("SCROLL a PRODUCTS");
            }}
          />
          <Link
            isAnchorPrimary
            text={"CONTACT"}
            href={"/contact"}
            onClick={(e) => {
              e.preventDefault();
              console.log("SCROLL a CONTACT");
            }}
          />
          <Link
            isAnchorPrimary
            text={"ABOUT US"}
            href={"/about_us"}
            onClick={(e) => {
              e.preventDefault();
              console.log("SCROLL a ABOUT US");
            }}
          />
          <Link
            isAnchorPrimary
            text={"TEAM"}
            href={"/team"}
            onClick={(e) => {
              e.preventDefault();
              console.log("SCROLL a TEAM");
            }}
          />
          <Link isAnchorPrimary text={"ACCESS"} href={"/access"} />
          <Link text={""} href={"###"} svg={<Carrito width="3.7" />} />
        </Box>
      </nav>
    </>
  );
};

export { Nav };
