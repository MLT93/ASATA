import styles from "./Header.module.scss";
import { Box } from "../05_PageStructure/Box/Box";
import { Section } from "../05_PageStructure/Section/Section";
import Mascota from "../../assets/icons/06_Mascota";

/**
 *
 * @param {Object} props - Propiedades para renderizar el tipo de texto
 * @param {string} props.any - Por hacer...
 *
 * @returns {JSX.Element} Elemento | Estructura HTML
 */

const Header = (): JSX.Element => {
  return (
    <>
      <header>
        <Section bg={"../../../public/portada.png"}>
          <Box isFlexColStart alignItems="center" className={styles.height_for_img}>
            <Mascota width="10" />
          </Box>
        </Section>
      </header>
    </>
  );
};

export { Header };
