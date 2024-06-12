import imgExample from "../img/mario.png";

/**
 *
 * @param {Object} props - Propiedades para renderizar el componente
 * @param {string} props.color - Color del icono
 * @param {string} props.width - Ancho del icono
 *
 * @returns {JSX.Element} Elemento | Estructura HTML
 */

const IconExample2 = ({
  width,
  color,
}: {
  width: string;
  color?: string;
  }): JSX.Element => {
    // style={{ width: `${width}rem`, color: `${color}`, height: `auto` }}

    return (
      <img
        src={imgExample}
        alt="Mario Bros"
        style={{ color: `${color}`, width: `${width}rem`, height: "auto" }}
      />
    );
  };

export default IconExample2;
