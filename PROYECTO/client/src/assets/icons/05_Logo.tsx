/**
 *
 * @param {Object} props - Propiedades para renderizar el componente
 * @param {string} props.width - Ancho del icono
 *
 * @returns {JSX.Element} Elemento | Estructura HTML
 */

const Logo = ({
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
        width="500.000000pt"
        height="500.000000pt"
        viewBox="0 50 470.000000 470.000000"
        preserveAspectRatio="xMidYMid meet"
        style={{ width: `${width}rem`, color: `${color}`, height: `auto` }}>
        <g
          transform="translate(0.000000,500.000000) scale(0.100000,-0.100000)"
          // fill="#000000"
          fill="#ff7f08e7"
          stroke="none">
          <path
            d="M2269 3883 c-18 -47 -68 -193 -101 -293 -35 -110 -96 -272 -107 -282
-4 -5 -56 -15 -116 -23 -147 -19 -411 -70 -480 -91 -30 -10 -58 -15 -61 -11
-7 7 48 141 103 250 55 110 125 279 126 306 2 22 -7 30 -52 54 -30 15 -67 27
-81 27 -24 0 -31 -9 -60 -72 -17 -40 -42 -106 -55 -148 -13 -41 -52 -167 -87
-279 l-63 -205 -145 -56 c-277 -108 -443 -210 -481 -295 -34 -74 -21 -116 44
-146 41 -18 137 -26 150 -12 4 3 -21 20 -55 37 -38 19 -64 38 -66 50 -6 30 56
83 168 143 102 53 330 147 330 134 0 -3 -13 -60 -29 -126 -47 -188 -59 -259
-77 -425 -26 -249 -7 -497 43 -552 34 -38 38 -22 39 159 0 268 36 471 152 868
l38 130 125 32 c117 30 319 64 473 79 64 6 68 5 62 -12 -21 -70 -96 -372 -107
-434 -8 -44 -14 -150 -14 -255 0 -187 6 -219 49 -254 13 -11 15 -3 15 66 -1
126 28 331 65 460 34 118 131 412 139 419 2 3 51 -5 108 -16 57 -11 110 -20
117 -20 20 0 43 67 40 113 -3 37 -7 44 -40 60 -20 10 -59 20 -86 24 -81 9 -81
9 -24 129 89 193 120 268 137 331 14 56 14 66 1 92 -18 33 -73 71 -105 71 -14
0 -25 -9 -32 -27z"
          />
          <path
            d="M2501 3377 c-12 -15 -37 -130 -43 -192 -2 -34 0 -40 17 -43 11 -1 25
1 30 5 23 17 94 142 109 189 5 17 0 25 -28 38 -41 19 -70 20 -85 3z"
          />
          <path
            d="M4105 3176 c-27 -13 -59 -34 -71 -47 -33 -38 -84 -137 -78 -152 3 -8
-4 -59 -16 -115 -28 -137 -27 -229 3 -272 12 -18 38 -42 57 -53 53 -30 83 -18
166 67 55 57 81 94 118 171 74 156 105 300 76 356 -6 10 -33 30 -60 44 -64 32
-128 33 -195 1z m197 -40 c15 -35 -23 -198 -69 -295 -38 -81 -171 -231 -204
-231 -35 0 -30 85 12 230 41 141 48 159 76 202 21 31 23 40 13 58 -8 15 -9 25
-2 32 14 14 68 26 120 27 36 1 44 -3 54 -23z"
          />
          <path
            d="M3642 3105 c-36 -36 -67 -65 -68 -65 -2 0 0 15 3 33 4 24 0 37 -15
50 -27 24 -94 34 -109 16 -32 -39 -91 -222 -156 -484 -65 -258 -70 -298 -71
-480 -1 -164 0 -172 24 -215 16 -29 33 -46 47 -48 21 -3 22 -1 11 28 -18 54
-4 287 26 425 38 171 32 160 67 125 60 -59 134 -30 231 91 112 141 189 292
209 416 15 87 -2 136 -55 158 -58 24 -73 19 -144 -50z m94 -2 c12 -46 -11
-145 -62 -263 -66 -155 -99 -206 -169 -263 -67 -53 -107 -60 -113 -19 -4 25
58 194 96 262 61 108 213 310 233 310 5 0 12 -12 15 -27z"
          />
          <path
            d="M3074 3118 c-16 -13 -47 -42 -68 -65 -40 -45 -64 -57 -46 -23 16 31
2 60 -36 76 -65 27 -82 20 -111 -43 -39 -89 -119 -373 -168 -599 -63 -288 -46
-566 35 -587 19 -5 21 -2 16 21 -14 72 -17 185 -6 262 12 88 58 311 67 320 2
3 10 -2 16 -11 29 -39 87 -50 135 -25 66 34 201 215 269 362 48 105 65 221 39
276 -10 21 -25 39 -34 42 -61 17 -78 16 -108 -6z m46 -89 c0 -75 -25 -150
-101 -304 -52 -105 -67 -127 -120 -172 -64 -55 -113 -70 -125 -38 -7 18 43
160 87 247 66 131 228 346 250 332 5 -3 9 -32 9 -65z"
          />
          <path
            d="M2395 3028 c-3 -7 -11 -33 -19 -58 -8 -25 -28 -83 -44 -130 -33 -94
-62 -220 -62 -273 0 -45 36 -97 87 -125 34 -19 46 -21 69 -12 61 23 132 112
218 271 25 47 46 89 46 92 0 18 -41 4 -62 -22 -12 -16 -43 -54 -68 -86 -50
-63 -134 -135 -158 -135 -13 0 -14 13 -9 83 7 91 25 149 87 281 l42 89 -23 18
c-27 21 -97 25 -104 7z"
          />
        </g>
      </svg>
    </>
  );
};

export default Logo;
