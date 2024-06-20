import styles from "./Home.module.scss";
import { Box } from "../../components/05_PageStructure/Box/Box";
import { Section } from "../../components/05_PageStructure/Section/Section";
// import { Text } from "../../components/01_Text/Text";
// import { Link } from "../../components/02_Link/Link";
// import { Button } from "../../components/03_Button/Button";
// import { Card } from "../../components/04_Card/Card";
// import IconExample1 from "../../assets/icons/01_Example1_svgAnimated";
// import IconExample2 from "../../assets/icons/02_Example2_img";

/**
 *
 * @param {Object} props - Propiedades para renderizar el tipo de texto
 * @param {string} props.any - ToDo Por hacer...
 *
 * @returns {JSX.Element} Elemento | Estructura HTML
 */

const Dev = (): JSX.Element => {
  return (
    <>
      <main className={styles.home}>
        <Section bg="var(--color-contrast-3)">
          <Box isFlexRowCenter alignItems="center" gap="7">

            <h2>Card Categories</h2>
            
          </Box>
        </Section>
      </main>
    </>
  );
};

export default Dev;

