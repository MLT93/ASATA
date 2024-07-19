import styles from "./Aside.module.scss";
import { Box } from "../05_PageStructure/Box/Box";
import { Section } from "../05_PageStructure/Section/Section";
import { SwiperComponent } from "../06_Swiper/Swiper";
// import { Card } from "../04_Card/Card";
// import Dollar from "../../assets/icons/07_Dollar";
// import Gorra from "../../assets/icons/08_Gorra";
// import TShirt from "../../assets/icons/09_T-shirt";

/**
 *
 * @param {Object} props - Propiedades para renderizar el tipo de texto
 * @param {string} props.any - ToDo Por hacer...
 *
 * @returns {JSX.Element} Elemento | Estructura HTML
 */

const Aside = (): JSX.Element => {
  return (
    <>
      <aside className={styles.aside}>
        <Section>
          <Box maxWidth="600" isFlexRowCenter gap="1" alignItems="center">
            {/* <Box isFlexColCenter gap="0.3" alignItems="center">
              <Card
                isCardTertiary
                preTitle={"Compra 2 y llévate 1 de ellos"}
                title={"Al 50% de descuento"}
                textButton={"Compra Ahora"}
                svgButton={
                  <Dollar width="1.5" color="var(--color-contrast-3)" />
                }
                onClick={() => console.log("Button Tertiary Card")}
              />
            </Box> */}
            <Box>
              <SwiperComponent />
            </Box>
            {/* <Box isFlexRowCenter gap="0.7" alignItems="center">
              <Card
                isCardPrimary
                svgCard={<TShirt width="3.5" />}
                preTitle="preTitle"
                title="Title"
                subtitle="Subtitle"
                body="Body"
                textButton="Compra Ahora"
                svgButton={
                  <Dollar width="1.5" color="var(--color-contrast-3)" />
                }
                onClick={() => console.log("Button Primary Card")}
              />
              <Card
                isCardSecondary
                svgCard={<Gorra width="3.5" color="var(--color-contrast-2)" />}
                preTitle="preTitle"
                title="Title"
                subtitle="Subtitle"
                body="Body"
                textButton="Compra Ahora"
                svgButton={
                  <Dollar width="1.5" color="var(--color-contrast-3)" />
                }
                onClick={() => console.log("Button Secondary Card")}
              />
            </Box> */}
          </Box>
        </Section>
      </aside>
    </>
  );
};

export { Aside };
