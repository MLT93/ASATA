import hippo2 from "../img/hippo2.jpg";

/**
 *
 * @param {Object} props - Propiedades para renderizar el componente
 * @param {string} props.width - Ancho del icono
 *
 * @returns {JSX.Element} Elemento | Estructura HTML
 */

const TShirt = ({
  width,
  color,
}: {
  width: string;
  color?: string;
}): JSX.Element => {
  // style={{ width: `${width}rem`, color: `${color}`, height: `auto` }}

  return (
    <>
      <img
        src={hippo2}
        alt="Imagen De 3 Gorros"
        style={{ width: `${width}rem`, color: `${color}`, height: `auto` }}
      />
    </>
  );
};

export default TShirt;
