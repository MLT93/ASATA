/**
 *
 * @param {Object} props - Propiedades para renderizar el componente
 * @param {string} props.width - Ancho del icono
 *
 * @returns {JSX.Element} Elemento | Estructura HTML
 */

const Dollar = ({
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
            d="M2315 5109 c-884 -91 -1661 -631 -2049 -1423 -93 -188 -137 -308
-186 -500 -61 -240 -74 -355 -74 -626 0 -271 13 -386 74 -626 49 -192 93 -312
185 -500 248 -505 663 -920 1170 -1169 248 -122 496 -199 770 -241 169 -26
541 -26 710 0 562 85 1054 333 1450 731 439 440 689 974 746 1595 14 158 7
413 -16 570 -106 718 -510 1358 -1115 1765 -322 216 -665 349 -1060 410 -126
19 -477 28 -605 14z m420 -509 c316 -30 599 -121 863 -278 528 -314 880 -831
984 -1442 30 -177 30 -463 0 -640 -150 -883 -820 -1552 -1702 -1702 -166 -28
-454 -30 -615 -5 -448 72 -836 269 -1150 582 -657 656 -791 1663 -328 2464
160 276 415 545 670 704 393 247 841 358 1278 317z"
          />
          <path
            d="M2462 4194 c-100 -50 -132 -120 -132 -291 0 -111 -1 -115 -22 -121
-49 -12 -196 -93 -248 -136 -78 -65 -144 -148 -190 -241 -56 -114 -74 -196
-73 -340 0 -144 22 -237 83 -353 128 -246 347 -384 650 -407 119 -9 155 -21
202 -63 87 -78 108 -209 52 -318 -38 -75 -88 -111 -175 -126 -114 -20 -195 17
-281 127 -52 65 -106 101 -175 115 -110 23 -218 -19 -267 -103 -55 -94 -53
-219 7 -306 45 -67 163 -186 219 -222 27 -17 74 -42 106 -55 l57 -23 5 -133
c6 -142 20 -186 72 -235 98 -92 305 -82 381 19 44 58 57 110 57 233 l0 113 83
39 c161 78 273 187 347 338 63 127 75 186 75 370 0 150 -2 166 -29 249 -58
177 -193 330 -361 411 -100 48 -187 70 -315 80 -119 9 -155 21 -202 63 -86 78
-108 207 -53 318 38 75 88 111 176 126 114 20 195 -17 281 -127 78 -98 177
-138 287 -116 104 21 170 90 191 199 22 120 -25 218 -173 358 -67 64 -163 123
-239 148 -16 5 -18 20 -18 123 -1 129 -11 171 -55 229 -64 83 -217 111 -323
58z"
          />
        </g>
      </svg>
    </>
  );
};

export default Dollar;
