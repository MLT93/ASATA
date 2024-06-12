import styles from "./Section.module.scss";

/**
 *
 * @param {Object} props - Propiedades para renderizar el tipo de texto
 * @param {string} props.children - Este componente acepta el anidamiento de contenido, utilizando dos etiquetas `<Section></Section>`
 * @param {string} props.bg - Color, gradiente o imagen que se desea proporcionar como background
 * @param {string} props.overflow - Forma de mostrar el contenido excedente al interno del contenedor: `visible` o `hidden`
 *
 * @returns {JSX.Element} Elemento | Estructura HTML
 */

const Section = ({
  children,
  bg,
  overflow,
}: {
  children: React.ReactNode;
  bg: string;
  overflow?: string;
}): JSX.Element => {
  return (
    <section
      className={styles.section}
      style={{ background: `${bg}`, overflow: `${overflow}` }}>
      {children}
    </section>
  );
};

export { Section };
