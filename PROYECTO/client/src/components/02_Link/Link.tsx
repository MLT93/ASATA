import "./Link.scss";
import classNames from "classnames";
import { Text } from "../01_Text/Text";

/**
 *
 * @param {Object} props - Propiedades para renderizar el tipo de texto
 * @param {string} props.text - El texto
 * @param {string} props.color - El color del texto
 * @param {string} props.href - URL de la página web relacionada
 * @param {string} props.svg - Icono del link
 * @param {string} props.gap - Espaciado entre el contenido de la caja, relacionado con `display: flex; | grid;`
 * @param {boolean} props.isTarget - Variable booleana para hacer que el renderizado de la URL se realice en otra página del navegador
 * @param {boolean} props.isSelf - Variable booleana para hacer que el renderizado de la URL se realice en la misma página del navegador
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
  isSelf,
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
  isSelf?: boolean;
  isAnchorPrimary?: boolean;
  isAnchorSecondary?: boolean;
  isAnchorTertiary?: boolean;
}): JSX.Element => {
  const targets = classNames({
    _blank: isTarget,
    _self: isSelf,
  });

  const anchorClassNames = classNames({
    anchor: true,
    is_anchor_primary: isAnchorPrimary,
    is_anchor_secondary: isAnchorSecondary,
    is_anchor_tertiary: isAnchorTertiary,
  });

  return (
    <a
      className={anchorClassNames}
      href={href}
      target={targets}
      rel="nofollow"
      style={{ gap: `${gap}rem` }}>
      {isAnchorSecondary  ? svg && svg : null}
      <Text size="an" text={text} color={color} />
    </a>
  );
};

export { Link };
