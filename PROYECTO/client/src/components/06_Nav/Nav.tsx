import styles from "./Nav.module.scss";
import { Link } from "../02_Link/Link";
import { Box } from "../05_PageStructure/Box/Box";
import IconExample2 from "../../assets/icons/02_Example2_img";
import { TbShoppingCartDollar } from "react-icons/tb";
// import { Button } from "../03_Button/Button";
// import { Link } from "../02_Link/Link";
// import { Box } from "../05_PageStructure/Box/Box";
// import { FaPhone, FaRegLightbulb, FaSolarPanel } from "react-icons/fa";
// import { BsFillPeopleFill, BsBatteryCharging } from "react-icons/bs";
// import { LuBadgeHelp } from "react-icons/lu";
// import IconExample3 from "../../assets/icons/03_Example3_svg";
// import IconExample1 from "../../assets/icons/01_Example1_svgAnimated";
// import Logo from "../../assets/Icons/Logo";

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
        <Box isFlexRowCenter>
          <Link text={""} href={""} svg={<IconExample2 width="3" />} />
        </Box>
        <Box isFlexRowSpaceBetween>
          <Link isAnchorPrimary text={"CATEGORIES"} href={"###"} />
          <Link isAnchorPrimary text={"CONTACT"} href={"###"} />
          <Link isAnchorPrimary text={"ABOUT US"} href={"###"} />
          <Link isAnchorPrimary text={"TEAM"} href={"###"} />
          <Link isAnchorPrimary text={"ACCESS"} href={"###"} />
          <Link isAnchorPrimary text={""} href={"carrito.php"} svg={<TbShoppingCartDollar />} />
        </Box>
      </nav>
    </>
  );
};

export { Nav };
