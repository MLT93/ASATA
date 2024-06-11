import "./Card.scss";
import { Text } from "../01_Text/Text";
import { Button } from "../03_Button/Button";
import { MouseEventHandler } from "react";
import classNames from "classnames";

/**
 *
 * @param {Object} props - Propiedades para renderizar el tipo de texto
 * @param {boolean} props.isCardPrimary - Booleano para definir si la card es de tipo primario o no
 * @param {boolean} props.isCardSecondary - Booleano para definir si la card es de tipo secundario o no
 * @param {boolean} props.className - Asignación de los estilos SCSS
 * @param {boolean} props.svgCard - El icono dentro de la card, puede ser un componente o un elemento svg
 * @param {boolean} props.preTitle - El texto previo al título del botón
 * @param {string} props.title - El texto del título del botón
 * @param {string} props.subtitle - El texto del subtítulo del botón
 * @param {string} props.body - El texto del cuerpo del botón
 * @param {string} props.textButton - El texto del botón de la card
 * @param {string} props.svgButton - El icono dentro del botón, puede ser un componente o un elemento svg
 * @param {MouseEventHandler<HTMLButtonElement> | string} props.onClick - Función al hacer click en el botón
 *
 * @returns {JSX.Element} Elemento HTML para el texto
 */

const Card = ({
  isCardPrimary,
  isCardSecondary,
  svgCard,
  preTitle,
  title,
  subtitle,
  body,
  textButton,
  svgButton,
  onClick,
}: {
  isCardPrimary?: boolean;
  isCardSecondary?: boolean;
  svgCard: JSX.Element | string;
  preTitle: string;
  title: string;
  subtitle: string;
  body: string;
  textButton: string;
  svgButton: JSX.Element | string;
  onClick: MouseEventHandler<HTMLButtonElement>;
}): JSX.Element => {
  const cardClassNames = classNames({
    card: true,
    is_card_primary: isCardPrimary,
    is_card_secondary: isCardSecondary,
  });

  return (
    <div className={cardClassNames}>
      {/* <Icono icono={icon} className={"cta-card-icon"} /> */}
      {svgCard && svgCard}
      <div className="container_card_text">
        <Text size={"pa_bold"} text={preTitle} />
        <Text size={"h2"} text={title} />
        <Text size={"pa_bold"} text={subtitle} />
      </div>
      <Text size={"pa"} text={body} />
      <div className="container_card_button">
        <div className="container_card_opacity">
          <Button
            isPrimary
            text={textButton}
            gap={"0.7"}
            svg={svgButton}
            onClick={onClick}
          />
        </div>
      </div>
    </div>
  );
};

export { Card };
