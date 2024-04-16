import styles from "./Text.module.scss";

/**
 *
 * @param {Object} props - Propiedades para renderizar el tipo de texto
 * @param {string} props.size - Variable para renderizar el tipo de texto según los estilos de `Text.scss`
 * @param {string} props.color - Nombre de la variable que empieza por "text-color" en el archivo variables.scss dentro de styles/variables.scss
 * @param {string} props.text - El texto
 * @param {string} props.textColorEnd - Color prefijado, inherente a la última palabra de la frase dentro del texto
 *
 * @returns {JSX.Element} Elemento HTML para el texto
 */

// /**
//  * ToDo: Agregar librería ClassNames para poder integrar el `text-align` en cada `<Text />`, y así modificar el alineamiento del texto que se desea escribir
//  */

const Text = ({
  size,
  color,
  text,
  textColorEnd,
}: {
  size: string;
  color?: string;
  text: string;
  textColorEnd?: string;
}): JSX.Element => {
  return (
    <>
      {size === "h1" && (
        <h1 className={styles.h1} style={{ color: `${color}` }}>
          {text}
          <span className={styles.h1_bold} style={{ color: "var(--color-bg)" }}>
            {textColorEnd && ` ${textColorEnd}`}
          </span>
        </h1>
      )}
      {size === "h1-bold" && (
        <h1 className={styles.h1_bold} style={{ color: `${color}` }}>
          {text}
          <span style={{ color: "var(--color-bg)" }}>
            {textColorEnd && ` ${textColorEnd}`}
          </span>
        </h1>
      )}
      {size === "h2" && (
        <h2 className={styles.h2} style={{ color: `${color}` }}>
          {text}
          <span className={styles.h2_bold} style={{ color: "var(--color-bg)" }}>
            {textColorEnd && ` ${textColorEnd}`}
          </span>
        </h2>
      )}
      {size === "h2-bold" && (
        <h2 className={styles.h2_bold} style={{ color: `${color}` }}>
          {text}
          <span style={{ color: "var(--color-bg)" }}>
            {textColorEnd && ` ${textColorEnd}`}
          </span>
        </h2>
      )}
      {size === "h3" && (
        <h3 className={styles.h3} style={{ color: `${color}` }}>
          {text}
          <span className={styles.h3_bold} style={{ color: "var(--color-bg)" }}>
            {textColorEnd && ` ${textColorEnd}`}
          </span>
        </h3>
      )}
      {size === "h3-bold" && (
        <h3 className={styles.h3_bold} style={{ color: `${color}` }}>
          {text}
          <span style={{ color: "var(--color-bg)" }}>
            {textColorEnd && ` ${textColorEnd}`}
          </span>
        </h3>
      )}
      {size === "h4" && (
        <h4 className={styles.h4} style={{ color: `${color}` }}>
          {text}
          <span className={styles.h4_bold} style={{ color: "var(--color-bg)" }}>
            {textColorEnd && ` ${textColorEnd}`}
          </span>
        </h4>
      )}
      {size === "h4-bold" && (
        <h4 className={styles.h4_bold} style={{ color: `${color}` }}>
          {text}
          <span style={{ color: "var(--color-bg)" }}>
            {textColorEnd && ` ${textColorEnd}`}
          </span>
        </h4>
      )}
      {size === "h5" && (
        <h5 className={styles.h5} style={{ color: `${color}` }}>
          {text}
          <span className={styles.h5_bold} style={{ color: "var(--color-bg)" }}>
            {textColorEnd && ` ${textColorEnd}`}
          </span>
        </h5>
      )}
      {size === "h5-bold" && (
        <h5 className={styles.h5_bold} style={{ color: `${color}` }}>
          {text}
          <span style={{ color: "var(--color-bg)" }}>
            {textColorEnd && ` ${textColorEnd}`}
          </span>
        </h5>
      )}
      {size === "p" && (
        <p className={styles.pa} style={{ color: `${color}` }}>
          {text}
          <span className={styles.pa_bold} style={{ color: "var(--color-bg)" }}>
            {textColorEnd && ` ${textColorEnd}`}
          </span>
        </p>
      )}
      {size === "p-bold" && (
        <p className={styles.pa_bold} style={{ color: `${color}` }}>
          {text}
          <span style={{ color: "var(--color-bg)" }}>
            {textColorEnd && ` ${textColorEnd}`}
          </span>
        </p>
      )}
      {size === "sp" && (
        <span className={styles.sp} style={{ color: `${color}` }}>
          {text}
        </span>
      )}
      {size === "sp-bold" && (
        <span className={styles.sp_bold} style={{ color: `${color}` }}>
          {text}
        </span>
      )}
      {size === "a" && (
        <span className={styles.an} style={{ color: `${color}` }}>
          {text}
        </span>
      )}
    </>
  );
};

export { Text };
