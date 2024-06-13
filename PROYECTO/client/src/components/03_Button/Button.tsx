import "./Button.scss";
import classNames from "classnames";
import { MouseEventHandler } from "react";
import { Text } from "../01_Text/Text";

/**
 *
 * @param {Object} props - Propiedades para renderizar el tipo de texto
 * @param {boolean} props.isButtonPrimary - Booleano para definir si el botón es de tipo primario o no
 * @param {boolean} props.isButtonSecondary - Booleano para definir si el botón es de tipo secundario
 * @param {boolean} props.isButtonTertiary - Booleano para definir si el botón es de tipo terciario
 * @param {string} props.text - El texto dentro del botón
 * @param {string} props.svg - El icono dentro del botón, puede ser un componente o un elemento svg
 * @param {string} props.gap - Espaciado entre el contenido de la caja, relacionado con `display: flex; | grid;`
 * @param {MouseEventHandler<HTMLButtonElement> | string} props.onClick - Función al hacer click en el botón
 *
 * @returns {JSX.Element} Elemento HTML para el texto
 */

const Button = ({
  isButtonPrimary,
  isButtonSecondary,
  isButtonTertiary,
  text,
  svg,
  gap,
  onClick,
}: {
  isButtonPrimary?: boolean;
  isButtonSecondary?: boolean;
  isButtonTertiary?: boolean;
  text: string;
  svg?: JSX.Element | string;
  gap?: string;
  onClick: MouseEventHandler<HTMLButtonElement>;
}): JSX.Element => {
  const buttonClassNames = classNames({
    button: true,
    is_button_primary: isButtonPrimary,
    is_button_secondary: isButtonSecondary,
    is_button_tertiary: isButtonTertiary,
  });

  const bgAnimations = classNames({
    bg_animation: isButtonSecondary,
  });

  return (
    <div style={{ width: `fit-content` }}>
      <div className={bgAnimations}>
        <button
          className={buttonClassNames}
          onClick={onClick}
          style={{ gap: `${gap}rem` }}>
          {<Text size="h5_bold" text={`${text}`} />}
          {svg && svg}
        </button>
      </div>
    </div>
  );
};

export { Button };
