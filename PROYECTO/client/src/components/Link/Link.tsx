import "./Link.scss";
import classNames from "classnames";
import { Text } from "../Text/Text";

/**
 *
 * @param {Object} props - Propiedades para renderizar el tipo de texto
 * @param {string} props.text - El texto
 * @param {string} props.color - El color del texto
 * @param {string} props.href - URL de la página web relacionada
 * @param {string} props.svg - Icono del link
 * @param {string} props.gap - Espaciado entre el contenido de la caja, relacionado con `display: flex; | grid;`
 * @param {boolean} props.isTarget - Variable booleana para hacer que el renderizado de la URL se realice en otra página del navegador
 * @param {boolean} props.isAnchorPrimary - Booleano para definir si el botón es de tipo primario o no
 * @param {boolean} props.isAnchorSecondary - Booleano para definir si el botón es de tipo secundario
 * @param {boolean} props.isAnchorTertiary - Booleano para definir si el botón es de tipo terciario
 *
 * @returns {JSX.Element} Elemento | Estructura HTML
 */

const Link = ({
  text,
  color,
  href,
  svg,
  gap,
  isTarget,
  isAnchorPrimary,
  isAnchorSecondary,
  isAnchorTertiary,
}: {
  text: string;
  color?: string;
  href: string;
  svg?: JSX.Element | string;
  gap?: string;
  isTarget?: boolean;
  isAnchorPrimary?: boolean;
  isAnchorSecondary?: boolean;
  isAnchorTertiary?: boolean;
}): JSX.Element => {
  // eslint-disable-next-line @typescript-eslint/no-unsafe-assignment, @typescript-eslint/no-unsafe-call
  const targets = classNames({
    _blank: isTarget,
  });

  // eslint-disable-next-line @typescript-eslint/no-unsafe-assignment, @typescript-eslint/no-unsafe-call
  const anchorClassNames = classNames({
    anchor: true,
    "is-anchor-primary": isAnchorPrimary,
    "is-anchor-secondary": isAnchorSecondary,
    "is-anchor-tertiary": isAnchorTertiary,
  });

  return (
    <a
      // eslint-disable-next-line @typescript-eslint/no-unsafe-assignment
      className={anchorClassNames}
      href={href}
      // eslint-disable-next-line @typescript-eslint/no-unsafe-assignment
      target={targets}
      rel="nofollow"
      style={{ gap: `${gap}rem` }}
    >
      {svg && svg}
      <Text size="a" text={text} color={color} />
    </a>
  );
};

export { Link };
