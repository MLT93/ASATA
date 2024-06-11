// import TickSVG from "../../assets/Icons/TickSVG";
import { Text } from "../01_Text/Text";
import "./Card.scss";

/**
 *
 * @param {Object} props - Propiedades para renderizar el tipo de texto
 * @param {string} props.title - Titulo de la card
 * @param {string} props.text - El texto
 * @param {string} props.bgColor - Color de fondo de la card
 * @param {string} props.titleColor - Color del titulo la card
 * @param {string} props.textColor - Color del texto la card
 * @param {string} props.button - Tipo de botón de la card
 *
 * @returns {JSX.Element} Elemento | Estructura HTML
 */

const Card = ({
  title,
  text,
  text2,
  text3,
  text4,
  bgColor,
  titleColor,
  textColor,
  button,
}: {
  text: string;
  text2: string;
  text3: string;
  text4: string;
  title: string;
  bgColor: string;
  titleColor: string;
  textColor: string;
  button: JSX.Element;
}): JSX.Element => {
  return (
    <div className="card-primary" style={{ background: `${bgColor}` }}>
      <div>
        <Text size="text-size-h3-bold" color={titleColor} text={title} />
      </div>
      <ul className="card-text">
        <li className="card-list">
          {/* <TickSVG color="var(--color-secondary)" /> */}
          <Text size="text-size-sp" color={textColor} text={text} />
        </li>
        <li className="card-list">
          {/* <TickSVG color="var(--color-secondary)" /> */}
          <Text size="text-size-sp" color={textColor} text={text2} />
        </li>
        <li className="card-list">
          {/* <TickSVG color="var(--color-secondary)" /> */}
          <Text size="text-size-sp" color={textColor} text={text3} />
        </li>
        <li className="card-list">
          {/* <TickSVG color="var(--color-secondary)" /> */}
          <Text size="text-size-sp" color={textColor} text={text4} />
        </li>
      </ul>
      <div>{button}</div>
    </div>
  );
};

export default Card;
