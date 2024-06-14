import styles from "./Footer.module.scss";
import { Link } from "../02_Link/Link";
import { Box } from "../05_PageStructure/Box/Box";

/**
 *
 * @param {Object} props - Propiedades para renderizar el tipo de texto
 * @param {string} props.any - ToDo Por hacer...
 *
 * @returns {JSX.Element} Elemento | Estructura HTML
 */

const Footer = (): JSX.Element => {
  return (
    <>
      <footer className={styles.footer}>
        <Box isFlexRow>
          <Box isFlexRowCenter gap="1" alignItems="center">
            <p className={styles.copyright}>Copyright&reg; Hippo Clothes </p>
          </Box>
          <Box isFlexRowCenter gap="1" alignItems="center">
            <h3>Iconos Social</h3>
          </Box>
          <Box isFlexRowCenter gap="1" alignItems="center">
            <Link isAnchorTertiary text={"Privacy Policy"} href={"###"} />
            <Link isAnchorTertiary text={"Term of Use"} href={"###"} />
          </Box>
        </Box>
      </footer>
    </>
  );
};

export { Footer };
