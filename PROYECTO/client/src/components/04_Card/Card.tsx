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
 * @param {boolean} props.isCardTertiary - Booleano para definir si la card es de tipo terciario o no
 * @param {boolean} props.isCardQuaternary - Booleano para definir si la card es de tipo cuaternario o no
 * @param {boolean} props.className - Asignación de los estilos SCSS
 * @param {boolean} props.svgCard - El icono dentro de la card, puede ser un componente o un elemento svg
 * @param {boolean} props.imgCard - La imagen dentro de la card, puede ser un componente o un imagen
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
  isCardTertiary,
  isCardQuaternary,
  svgCard,
  imgCard,
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
  isCardTertiary?: boolean;
  isCardQuaternary?: boolean;
  svgCard?: JSX.Element | string;
  imgCard?: JSX.Element | string;
  preTitle: string;
  title: string;
  subtitle?: string;
  body?: string;
  textButton: string;
  svgButton: JSX.Element | string;
  onClick: MouseEventHandler<HTMLButtonElement>;
}): JSX.Element => {
  const cardClassNames = classNames({
    card: true,
    is_card_primary: isCardPrimary,
    is_card_secondary: isCardSecondary,
    is_card_tertiary: isCardTertiary,
    is_card_quaternary: isCardQuaternary,
  });

  return (
    <div className={cardClassNames}>
      <div className="container_card_svg">
        {isCardTertiary || isCardQuaternary ? null : svgCard}
      </div>

      {isCardQuaternary ? (
        <div className="container_card_img">{imgCard}</div>
      ) : null}

      {isCardQuaternary ? null : (
        <div className="container_card_text">
          <Text size={"pa_bold"} text={`${preTitle}`} />
        </div>
      )}

      <div className="container_card_text">
        <Text size={"h3"} text={`${title}`} />
      </div>

      {isCardTertiary ? null : (
        <div className="container_card_text">
          <Text size={"pa_bold"} text={`${subtitle}`} />
        </div>
      )}

      {isCardTertiary || isCardQuaternary ? null : (
        <div className="container_card_text">
          <Text size={"pa"} text={`${body}`} />
        </div>
      )}

      <div className="container_card_button">
        <div className="container_card_opacity">
          <Button
            isButtonPrimary
            text={`${textButton}`}
            gap={"0.3"}
            svg={svgButton}
            onClick={onClick}
          />
        </div>
      </div>
    </div>
  );
};

export { Card };
