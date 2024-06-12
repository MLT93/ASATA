import styles from "./Nav.module.scss";
import { Link } from "../02_Link/Link";
import { Box } from "../05_PageStructure/Box/Box";
import Logo from "../../assets/icons/05_Logo";
import Carrito from "../../assets/icons/04_Carrito";

/**
 *
 * @param {Object} props - Propiedades para renderizar el tipo de texto
 * @param {string} props.any - Por hacer...
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
          paddingLeft="3">
          <Link text={""} href={"###"} svg={<Logo width="6" />} />
        </Box>
        <Box
          isFlexRowSpaceBetween
          textAlign="center"
          alignItems="center"
          paddingRight="1">
          <Link isAnchorPrimary text={"CATEGORIES"} href={"###"} />
          <Link isAnchorPrimary text={"CONTACT"} href={"###"} />
          <Link isAnchorPrimary text={"ABOUT US"} href={"###"} />
          <Link isAnchorPrimary text={"TEAM"} href={"###"} />
          <Link isAnchorPrimary text={"ACCESS"} href={"###"} />
          <Link text={""} href={"###"} svg={<Carrito width="3.7" />} />
        </Box>
      </nav>
    </>
  );
};

export { Nav };
