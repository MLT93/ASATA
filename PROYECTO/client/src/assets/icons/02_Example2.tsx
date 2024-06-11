import imgExample from "../img/mario.png";

/**
 *
 * @param {Object} props - Propiedades para renderizar el componente
 * @param {string} props.color - Color del icono
 * @param {string} props.width - Ancho del icono
 *
 * @returns {JSX.Element} Elemento | Estructura HTML
 */

const MarioBros = ({
  color,
  width,
}: {
  color?: string;
  width: string;
}): JSX.Element => {
  return (
    <img
      src={imgExample}
      alt="Genius with solar panel"
      style={{ color: `${color}`, width: `${width}rem`, height: "auto" }}
    />
  );
};

export default MarioBros;
