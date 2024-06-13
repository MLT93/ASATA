import styles from "./Section.module.scss";
import { ReactNode } from "react";

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
  children: ReactNode;
  bg?: string;
  overflow?: string;
}): JSX.Element => {
  const primeraLetraBg: string | undefined = bg?.slice(0, 1);

  console.log(primeraLetraBg);

  if (typeof bg !== "undefined") {
    if (primeraLetraBg === ".") {
      return (
        <section
          className={styles.section}
          style={{
            background: `linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.3)), no-repeat center 17%/100% url(${bg})`,
            overflow: `${overflow}`,
          }}>
          {children}
        </section>
      );
    } else {
      return (
        <section
          className={styles.section}
          style={{ background: `${bg}`, overflow: `${overflow}` }}>
          {children}
        </section>
      );
    }
  } else {
    return (
      <section className={styles.section} style={{ overflow: `${overflow}` }}>
        {children}
      </section>
    );
  }
};

export { Section };
