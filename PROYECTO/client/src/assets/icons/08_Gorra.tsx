/**
 *
 * @param {Object} props - Propiedades para renderizar el componente
 * @param {string} props.width - Ancho del icono
 *
 * @returns {JSX.Element} Elemento | Estructura HTML
 */

const Gorra = ({
  width,
  color,
}: {
  width: string;
  color?: string;
}): JSX.Element => {
  // style={{ width: `${width}rem`, color: `${color}`, height: `auto` }}

  return (
    <>
      <svg
        version="1.0"
        xmlns="http://www.w3.org/2000/svg"
        width="512.000000pt"
        height="512.000000pt"
        viewBox="0 0 512.000000 512.000000"
        preserveAspectRatio="xMidYMid meet"
        style={{ width: `${width}rem`, fill: `${color}`, height: `auto` }}>
        <g
          transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)"
          // fill="#000000"
          stroke="none">
          <path
            d="M2900 4514 c-108 -29 -193 -106 -206 -185 l-6 -37 -72 -6 c-107 -10
-347 -61 -479 -101 -545 -165 -891 -509 -1018 -1012 -51 -204 -62 -316 -58
-623 2 -151 3 -350 2 -441 l-2 -166 127 -61 c410 -194 914 -308 1607 -364 207
-16 915 -16 1140 0 94 7 255 21 359 32 180 18 190 20 240 51 140 88 317 191
438 254 l135 70 6 155 c10 234 8 601 -3 725 -42 441 -220 808 -512 1053 -279
234 -649 383 -1091 439 -131 17 -136 18 -141 43 -30 141 -264 228 -466 174z"
          />
          <path
            d="M765 1724 c-476 -252 -669 -386 -726 -508 -40 -84 -44 -128 -20 -206
l20 -65 138 -54 c413 -161 801 -258 1172 -292 168 -15 541 -7 706 16 273 37
798 139 975 190 317 91 645 233 970 420 132 76 274 167 284 183 2 4 -55 2
-127 -4 -387 -36 -1101 -43 -1412 -14 -732 67 -1243 189 -1647 391 -54 27
-107 49 -116 49 -9 0 -107 -48 -217 -106z"
          />
        </g>
      </svg>
    </>
  );
};

export default Gorra;
