import "./Box.scss";
import classNames from "classnames";

/**
 *
 * @param {Object} props - Propiedades para renderizar el tipo de texto
 * @param {string} props.children - Este componente acepta el anidamiento de contenido, utilizando dos etiquetas `<Box></Box>`
 * @param {string} props.className - Este componente acepta un className personalizado adicional
 * @param {boolean} props.isFlexCol - Display Flex en Column
 * @param {boolean} props.isFlexColCenter - Display Flex en Column y todo centrado
 * @param {boolean} props.isFlexColStart - Display Flex en Column y todo en Flex-Start
 * @param {boolean} props.isFlexColSpaceBetween - Display Flex en Column y el alineamiento horizontal en Space-Between
 * @param {boolean} props.isFlexRow - Display Flex en Row
 * @param {boolean} props.isFlexRowCenter - Display Flex en Row y todo centrado
 * @param {boolean} props.isFlexRowStart - Display Flex en Row y todo en Flex-Start
 * @param {boolean} props.isFlexRowSpaceBetween - Display Flex en Row y el alineamiento horizontal en Space-Between
 * @param {boolean} props.isFlexRowSpaceAround - Display Flex en Row y el alineamiento horizontal en Space-Around
 * @param {boolean} props.isItemWithBlur - Crea una ventana en el background del contenido con border radius y blur
 * @param {string} props.bg - Color, gradiente o imagen que se desea proporcionar al fondo de la sección
 * @param {string} props.maxWidth - Ancho máximo del contenedor
 * @param {string} props.height - Dimensión correspondiente a la altura del contenedor
 * @param {boolean} props.isRelative - Crea una posición Relativa al contenedor padre
 * @param {boolean} props.isAbsolute - Crea una posición Absoluta al viewport del navegador
 * @param {boolean} props.isFixed - Crea una posición Fija al viewport del navegador, en la cual al realizar el scroll se quedará en su lugar
 * @param {string} props.top - Elegir la posición exacta teniendo como referencia el alto del navegador o del contenedor padre, relacionado con `isRelative | isAbsolute | isFixed`
 * @param {string} props.bottom - Elegir la posición exacta teniendo como referencia el fondo del navegador o del contenedor padre, relacionado con `isRelative | isAbsolute | isFixed`
 * @param {string} props.right - Elegir la posición exacta teniendo como referencia la parte derecha del navegador o del contenedor padre, relacionado con `isRelative | isAbsolute | isFixed`
 * @param {string} props.left - Elegir la posición exacta teniendo como referencia la parte izquierda del navegador o del contenedor padre, relacionado con `isRelative | isAbsolute | isFixed`
 * @param {string} props.paddingTop - Espaciado interno de la caja, relacionada con la parte superior de la misma
 * @param {string} props.paddingBottom - Espaciado interno de la caja, relacionada con la parte inferior de la misma
 * @param {string} props.marginTop - Espaciado externo de la caja, relacionado con la parte de arriba
 * @param {string} props.marginBottom - Espaciado externo de la caja, relacionado con la parte de abajo
 * @param {string} props.marginRight - Espaciado externo de la caja, relacionado con la parte de la derecha
 * @param {string} props.marginLeft - Espaciado externo de la caja, relacionado con la parte de la izquierda
 * @param {string} props.gap - Espaciado entre el contenido de la caja, relacionado con `display: flex; | grid;`
 * @param {string} props.zIndex - Capa de la caja, la sobrepone o la pone por debajo, relacionado con el posicionamiento `relative | absolute | block`
 * @param {string} props.overflow - Forma de mostrar el contenido excedente al interno del contenedor: `visible | hidden`
 * @param {string} props.alignItems - Alineamiento Vertical u Horizontal, dependiendo del `flexCol | flexRow` que se haya elegido, entre las opciones `flex-start | flex-end | baseline | center`
 * @param {string} props.textAlign - Alineamiento Vertical u Horizontal del texto, entre las opciones `center | end | left | right | start`
 *
 * @returns {JSX.Element} Elemento | Estructura HTML
 */

export const Box = ({
  children,
  className,
  isFlexCol,
  isFlexColCenter,
  isFlexColStart,
  isFlexColSpaceBetween,
  isFlexRow,
  isFlexRowCenter,
  isFlexRowStart,
  isFlexRowSpaceBetween,
  isFlexRowSpaceAround,
  isItemWithBlur,
  bg,
  maxWidth,
  height,
  isRelative,
  isAbsolute,
  isFixed,
  top,
  bottom,
  right,
  left,
  paddingTop,
  paddingBottom,
  marginTop,
  marginBottom,
  marginRight,
  marginLeft,
  gap,
  zIndex,
  overflow,
  alignItems,
  textAlign,
}: {
  children: React.ReactNode;
  className?: string;
  isFlexCol?: boolean;
  isFlexColCenter?: boolean;
  isFlexColStart?: boolean;
  isFlexColSpaceBetween?: boolean;
  isFlexRow?: boolean;
  isFlexRowCenter?: boolean;
  isFlexRowStart?: boolean;
  isFlexRowSpaceBetween?: boolean;
  isFlexRowSpaceAround?: boolean;
  isItemWithBlur?: boolean;
  bg?: string;
  maxWidth?: string;
  height?: string;
  isRelative?: boolean;
  isAbsolute?: boolean;
  isFixed?: boolean;
  top?: string;
  bottom?: string;
  right?: string;
  left?: string;
  paddingTop?: string;
  paddingBottom?: string;
  marginTop?: string;
  marginBottom?: string;
  marginRight?: string;
  marginLeft?: string;
  gap?: string;
  zIndex?: string;
  overflow?: string;
  alignItems?: string;
  textAlign?: CanvasTextAlign | undefined;
}): JSX.Element => {
  const views = classNames({
    box: true,
    "flex-col": isFlexCol,
    "flex-col-center": isFlexColCenter,
    "flex-col-start": isFlexColStart,
    "flex-col-space-between": isFlexColSpaceBetween,
    "flex-row": isFlexRow,
    "flex-row-center": isFlexRowCenter,
    "flex-row-start": isFlexRowStart,
    "flex-row-space-between": isFlexRowSpaceBetween,
    "flex-row-space-around": isFlexRowSpaceAround,
    "item-with-blur": isItemWithBlur,
    "position-relative": isRelative,
    "position-absolute": isAbsolute,
    "position-fixed": isFixed,
  });

  const combinedStyles = classNames(views, className); // Añadir `className` es útil si necesito utilizar un className específico para ese box
  return (
    <div
      className={combinedStyles}
      style={{
        maxWidth: `${maxWidth}px`,
        height: `${height}px`,
        background: `${bg}`,
        gap: `${gap}rem`,
        paddingTop: `${paddingTop}rem`,
        paddingBottom: `${paddingBottom}rem`,
        marginTop: `${marginTop}rem`,
        marginBottom: `${marginBottom}rem`,
        marginRight: `${marginRight}rem`,
        marginLeft: `${marginLeft}rem`,
        top: `${top}rem`,
        bottom: `${bottom}rem`,
        right: `${right}rem`,
        left: `${left}rem`,
        zIndex: `${zIndex}`,
        overflow: `${overflow}`,
        alignItems: `${alignItems}`,
        textAlign: textAlign,
      }}>
      {children}
    </div>
  );
};
