/**
 *
 * @param {Object} props - Propiedades para renderizar el componente
 * @param {string} props.width - Ancho del icono
 *
 * @returns {JSX.Element} Elemento | Estructura HTML
 */

const IconExample3 = ({
  width,
  color,
}: {
  width: string;
  color?: string;
  }): JSX.Element => {
    // style={{ width: `${width}rem`, color: `${color}`, height: `auto` }}

    return (
      <svg
        version="1.1"
        xmlns="http://www.w3.org/2000/svg"
        viewBox="0 220 600 200"
        style={{ width: `${width}rem`, color: `${color}`, height: `auto` }}>
        <path
          d="M0 0 C1.37381836 0.00132935 1.37381836 0.00132935 2.77539062 0.00268555 C11.20687195 0.14900354 19.14317693 1.35697585 26.34375 6.07421875 C28.57605649 7.563835 28.57605649 7.563835 30.65625 7.21875 C31.3471875 6.9403125 32.038125 6.661875 32.75 6.375 C33.7709375 5.9934375 34.791875 5.611875 35.84375 5.21875 C36.9678125 4.7753125 38.091875 4.331875 39.25 3.875 C52.11286651 -1.19934183 66.93311356 -1.66537917 80.046875 3.109375 C89.04927435 7.32437123 95.31331393 13.94902976 98.9119873 23.22967529 C100.63988624 29.7150224 100.23275019 36.44031084 100.140625 43.1015625 C100.13315008 44.70152067 100.12746307 46.30148809 100.12347412 47.90145874 C100.10831596 52.08060686 100.06912125 56.259185 100.0246582 60.43811035 C99.98349146 64.71517225 99.96541775 68.99232767 99.9453125 73.26953125 C99.90261542 81.63828028 99.83448607 90.00656892 99.75 98.375 C95.07698542 99.20006299 90.55303715 99.58912082 85.8125 99.625 C85.13509766 99.645625 84.45769531 99.66625 83.75976562 99.6875 C78.00655947 99.73162814 73.41517842 98.50714274 68.875 94.875 C66.58302318 91.8190309 66.6178502 88.8547019 66.59228516 85.18847656 C66.58202301 84.13017639 66.57176086 83.07187622 66.56118774 81.98150635 C66.55388641 80.8377655 66.54658508 79.69402466 66.5390625 78.515625 C66.51099006 76.09634745 66.48232557 73.6770767 66.453125 71.2578125 C66.41189132 67.44173399 66.3750054 63.6257821 66.34863281 59.80957031 C66.32098042 56.12798749 66.27510299 52.44698383 66.2265625 48.765625 C66.22330963 47.62998108 66.22005676 46.49433716 66.21670532 45.32427979 C66.1230523 39.27025242 65.77004912 34.68425467 62.75 29.375 C60.83383399 28.02060653 60.83383399 28.02060653 58.5625 27.75 C57.84707031 27.59273438 57.13164062 27.43546875 56.39453125 27.2734375 C52.74004456 27.2747745 52.74004456 27.2747745 45.75 30.375 C45.42 52.485 45.09 74.595 44.75 97.375 C39.32786437 98.92418161 35.22063703 99.71370037 29.75 99.6875 C28.74066406 99.71166992 28.74066406 99.71166992 27.7109375 99.73632812 C22.59723434 99.74126413 19.19855943 98.7051978 14.75 96.375 C11.25731006 91.83450307 10.62680049 87.65024088 10.62402344 82.04321289 C10.62021667 80.97853287 10.61640991 79.91385284 10.61248779 78.81690979 C10.61146057 77.67205612 10.61043335 76.52720245 10.609375 75.34765625 C10.59105357 72.9225166 10.57148388 70.49738612 10.55078125 68.07226562 C10.52176516 64.2492722 10.49999865 60.42687065 10.49951172 56.60375977 C10.49618326 52.9136911 10.4616745 49.2249883 10.421875 45.53515625 C10.4289447 44.39232681 10.4360144 43.24949738 10.44329834 42.07203674 C10.39335878 35.68180853 10.39335878 35.68180853 7.41503906 30.17358398 C4.0123476 27.87717248 1.85455671 27.44456876 -2.25 27.375 C-4.89 28.035 -7.53 28.695 -10.25 29.375 C-10.25 51.815 -10.25 74.255 -10.25 97.375 C-15.67213563 98.92418161 -19.77936297 99.71370037 -25.25 99.6875 C-26.25933594 99.71166992 -26.25933594 99.71166992 -27.2890625 99.73632812 C-32.40269314 99.74126406 -35.78731174 98.66785988 -40.25 96.375 C-44.41893196 92.06710365 -44.37870811 87.56892519 -44.42700195 81.78979492 C-44.43357315 81.13721207 -44.44014435 80.48462921 -44.44691467 79.81227112 C-44.46656952 77.66000234 -44.47829235 75.50780306 -44.48828125 73.35546875 C-44.49235678 72.61765985 -44.4964323 71.87985096 -44.50063133 71.11968422 C-44.52145822 67.21480213 -44.53577481 63.30995484 -44.54516602 59.4050293 C-44.55622692 55.38342576 -44.5906322 51.36237604 -44.63033772 47.34096813 C-44.65654718 44.23788969 -44.66486162 41.13494246 -44.66844749 38.03176308 C-44.67330185 36.54986135 -44.68488298 35.06796502 -44.70348549 33.5861721 C-44.87259218 19.2239612 -44.87259218 19.2239612 -40.25 13.375 C-29.73847001 3.49924804 -13.97396221 -0.02445701 0 0 Z "
          fill="#F9FAFD"
          transform="translate(258.25,246.625)"
        />
        <path
          d="M0 0 C9.54050766 9.78409509 10.15268692 21.64076848 10.16796875 34.6328125 C10.17296135 36.12601517 10.17296135 36.12601517 10.17805481 37.64938354 C10.18309219 39.74199973 10.18546413 41.83462386 10.18530273 43.92724609 C10.18749808 47.12220408 10.20571192 50.31682129 10.22460938 53.51171875 C10.22754223 55.55208216 10.22952775 57.5924472 10.23046875 59.6328125 C10.23765427 60.5829422 10.24483978 61.5330719 10.25224304 62.51199341 C10.22684191 69.89860943 9.33947743 75.50562306 4 81 C-3.43732734 85.67408859 -11.23401717 89.04166104 -20 90 C-20.90492188 90.10828125 -21.80984375 90.2165625 -22.7421875 90.328125 C-38.72159681 92.01016809 -56.74654884 91.70457483 -70.375 82.1875 C-76.11114266 77.50925251 -79.69180802 72.37344569 -81 65 C-81.6885572 55.50774724 -81.33772077 47.03896 -75.4375 39.25 C-64.10120346 27.33447663 -43.39779536 27.32336967 -28 26 C-26.33356898 25.97197464 -24.66611905 25.957279 -23 26 C-24.93427244 21.41882843 -26.39909187 19.03295941 -31 17 C-43.61491994 13.77292746 -56.85246431 17.41343619 -69 21 C-72.51044395 17.72358564 -74.74245481 15.2443224 -75.30078125 10.37890625 C-75.34164811 0.55723831 -75.34164811 0.55723831 -72 -3 C-54.64802921 -16.40834107 -16.4666464 -13.38300476 0 0 Z M-48 54 C-48.75011367 57.45728358 -48.75011367 57.45728358 -48 61 C-45.24109009 64.49461923 -42.50541167 65.2917037 -38.25 65.875 C-33.28442228 66.20256435 -28.72263715 65.57062648 -24 64 C-22.63467451 62.86298403 -22.63467451 62.86298403 -22.90234375 59.83984375 C-22.91394531 58.55207031 -22.92554688 57.26429688 -22.9375 55.9375 C-22.94652344 54.64714844 -22.95554687 53.35679687 -22.96484375 52.02734375 C-22.97644531 51.02832031 -22.98804688 50.02929688 -23 49 C-36.44777195 48.38584584 -36.44777195 48.38584584 -48 54 Z "
          fill="#F9FAFD"
          transform="translate(454,257)"
        />
        <path
          d="M0 0 C9.48018747 6.96255527 15.88621288 15.38298611 18.125 27.1875 C19.01107971 39.0229932 19.01107971 39.0229932 15.125 44.1875 C11.36719274 47.70056029 8.45772088 48.87800777 3.41796875 49.76953125 C2.76974655 49.8871431 2.12152435 50.00475494 1.45365906 50.12593079 C-0.65300497 50.50012015 -2.7625353 50.84766275 -4.875 51.1875 C-5.58831482 51.30333435 -6.30162964 51.4191687 -7.03656006 51.53851318 C-11.45669037 52.24758065 -15.88247877 52.91098382 -20.31323242 53.55004883 C-22.59959039 53.88035844 -24.88476573 54.21812594 -27.16992188 54.55664062 C-28.6379576 54.77126631 -30.10605433 54.9854752 -31.57421875 55.19921875 C-32.25022629 55.29917648 -32.92623383 55.39913422 -33.62272644 55.50212097 C-36.76523203 55.95172995 -39.68768699 56.1875 -42.875 56.1875 C-39.89921181 61.64311168 -36.71608858 64.06643431 -30.875 66.1875 C-19.8133305 68.93472384 -7.48253274 67.60925803 2.625 62.375 C5.125 61.1875 5.125 61.1875 7.25 61.6875 C10.60436796 64.37099436 12.76590177 67.1102053 14.125 71.1875 C14.62701239 77.31205118 14.22428344 80.31267646 10.125 85.1875 C2.31514681 92.99735319 -10.45832753 93.99696318 -20.98876953 94.23535156 C-36.65952105 94.17099529 -51.2088198 90.92908905 -63.12109375 80.15625 C-75.20610371 67.54580483 -77.50777429 53.09390536 -77.1875 36.375 C-76.60298457 22.93114507 -70.80894416 12.2409771 -61.20703125 3.04296875 C-44.65543339 -10.12622552 -17.77884485 -11.10805549 0 0 Z M-43.25 25.125 C-44.75683101 27.96479691 -45.33630838 30.0662574 -45.875 33.1875 C-38.42281766 32.75613615 -31.06428355 31.86307113 -23.6875 30.75 C-22.83760498 30.62778076 -21.98770996 30.50556152 -21.11206055 30.37963867 C-19.02077121 30.05292115 -16.94519554 29.62855083 -14.875 29.1875 C-14.545 28.5275 -14.215 27.8675 -13.875 27.1875 C-16.39360863 22.98981895 -18.22993693 19.96646033 -22.875 18.1875 C-31.55115687 17.09793611 -37.56751487 18.09666313 -43.25 25.125 Z "
          fill="#F9FAFD"
          transform="translate(103.875,253.8125)"
        />
        <path
          d="M0 0 C9.05025833 4.94607141 15.59178295 16.37495329 21.1875 24.75 C25.21895602 23.40618133 26.57379357 20.73962271 28.875 17.375 C29.31924316 16.75101318 29.76348633 16.12702637 30.22119141 15.48413086 C32.34576799 12.4901321 34.33182385 9.50535005 36.19921875 6.33984375 C38.01757187 3.38549643 39.56618136 1.0261628 42.1875 -1.25 C48.5446362 -2.55932886 55.03359349 -0.64667008 60.5625 2.6015625 C63.8917853 4.95447086 65.7615792 6.83855055 66.66796875 10.90625 C67.32255609 18.71189525 63.87107403 23.78757774 59.1875 29.75 C56.68729558 32.66172875 54.12825176 35.49253852 51.5 38.2890625 C48.93389275 41.01988609 46.54638918 43.84070334 44.1875 46.75 C45.72319081 51.58559786 48.49691858 54.85840354 51.6875 58.6875 C52.76362553 60.02059844 53.83780378 61.35527085 54.91015625 62.69140625 C56.5214635 64.6929856 58.13706363 66.68915096 59.77685547 68.66748047 C68.095733 78.76840636 68.095733 78.76840636 68.3125 83.44921875 C66.55065197 89.50557137 62.32357737 93.32594842 57.1875 96.75 C50.7959582 98.45697803 45.00730927 97.88454718 39.1875 94.75 C32.5971977 89.96183625 28.29173385 82.82867217 23.86767578 76.12231445 C23.4189209 75.44386475 22.97016602 74.76541504 22.5078125 74.06640625 C22.10836426 73.45224854 21.70891602 72.83809082 21.29736328 72.20532227 C20.23434154 70.59008048 20.23434154 70.59008048 18.1875 69.75 C17.95546875 70.43449219 17.7234375 71.11898437 17.484375 71.82421875 C15.58838531 76.10161719 12.82648822 79.68241051 10.06201172 83.42431641 C8.12193473 86.05475305 6.26646184 88.6146649 4.6171875 91.44140625 C3.27985628 93.67963425 2.28392827 95.19518794 0.1875 96.75 C-6.56469957 98.16104872 -12.91549241 97.24006572 -18.8125 93.75 C-24.62311913 88.57096991 -24.62311913 88.57096991 -25.015625 84.796875 C-25.03109375 84.03890625 -25.0465625 83.2809375 -25.0625 82.5 C-25.10117187 81.37851562 -25.10117187 81.37851562 -25.140625 80.234375 C-24.3533542 74.27361034 -20.59917498 69.99602845 -16.75 65.625 C-15.77294004 64.49391911 -14.79639013 63.36239746 -13.8203125 62.23046875 C-13.3243457 61.6586084 -12.82837891 61.08674805 -12.31738281 60.49755859 C-9.88516975 57.67312948 -7.50516164 54.80580015 -5.125 51.9375 C-4.29613281 50.94105469 -3.46726562 49.94460938 -2.61328125 48.91796875 C-1.72189453 47.84482422 -1.72189453 47.84482422 -0.8125 46.75 C-4.13623589 42.0346186 -7.71595267 37.68195701 -11.625 33.4375 C-12.470625 32.50550781 -13.31625 31.57351563 -14.1875 30.61328125 C-15.95152348 28.68913064 -17.74399757 26.79071628 -19.5625 24.91796875 C-25.77511066 18.14660195 -25.77511066 18.14660195 -25.87890625 14.26953125 C-25.14530937 11.79519603 -24.20689059 9.91764355 -22.8125 7.75 C-22.44898438 7.16089844 -22.08546875 6.57179687 -21.7109375 5.96484375 C-16.53553211 -1.19974807 -8.04001164 -3.18048653 0 0 Z "
          fill="#F9FAFD"
          transform="translate(502.8125,249.25)"
        />
        <path
          d="M0 0 C0.99 0.495 0.99 0.495 2 1 C-7.63655826 12.97722099 -17.73610814 24.55777615 -28 36 C-18.06262257 38.43681777 -8.08447392 40.29711279 2 42 C0.45427224 45.81628832 -1.88771245 47.97025743 -4.9375 50.6875 C-5.42621582 51.12465332 -5.91493164 51.56180664 -6.41845703 52.01220703 C-9.66485692 54.89222899 -12.99608503 57.6510289 -16.375 60.375 C-21.81386605 64.76344127 -26.90728904 69.46446412 -32.015625 74.2265625 C-35.60398949 77.57138295 -39.2769636 80.80606062 -43 84 C-43.55961426 84.48065918 -44.11922852 84.96131836 -44.69580078 85.45654297 C-48.79337298 88.97551062 -52.89542461 92.48920448 -57 96 C-57.66 95.67 -58.32 95.34 -59 95 C-56.72559051 90.71727764 -54.45100376 86.43464949 -52.17626953 82.15209961 C-51.40636689 80.7025797 -50.63650838 79.25303635 -49.86669922 77.8034668 C-44.58795082 67.86354906 -39.29967867 57.9287747 -34 48 C-34.62366455 47.9575415 -35.2473291 47.91508301 -35.88989258 47.87133789 C-43.92684848 47.24088837 -51.76549511 45.90362532 -59.6875 44.4375 C-61.61625977 44.08655273 -61.61625977 44.08655273 -63.58398438 43.72851562 C-66.72346852 43.15663933 -69.86207986 42.58038572 -73 42 C-73 41.34 -73 40.68 -73 40 C-72.39341553 39.67427002 -71.78683105 39.34854004 -71.16186523 39.01293945 C-59.92126531 32.96939079 -48.71497609 26.87887136 -37.625 20.5625 C-29.60161976 16.00631603 -21.55267466 11.49960652 -13.449646 7.0866394 C-11.71369909 6.13929739 -9.98205446 5.18408542 -8.25048828 4.22875977 C-7.20231934 3.66084717 -6.15415039 3.09293457 -5.07421875 2.5078125 C-4.14182373 1.99879395 -3.20942871 1.48977539 -2.2487793 0.96533203 C-1.13563354 0.48749268 -1.13563354 0.48749268 0 0 Z "
          fill="#4A6EF8"
          transform="translate(207,257)"
        />
        <path
          d="M0 0 C0.99 0.495 0.99 0.495 2 1 C0.88886634 2.07699268 -0.24009721 3.13558417 -1.375 4.1875 C-2.00148438 4.77917969 -2.62796875 5.37085938 -3.2734375 5.98046875 C-6.45023772 8.33348553 -9.74768404 9.92457251 -13.296875 11.64526367 C-17.77105697 13.88760794 -22.02567613 16.484692 -26.3125 19.0625 C-37.13126211 25.51512549 -48.04893126 31.77439243 -59 38 C-44.48 39.98 -29.96 41.96 -15 44 C-19 47 -19 47 -21.38671875 47.7421875 C-25.28735438 49.61962349 -27.27211306 52.69937809 -29.8125 56.125 C-30.31458984 56.78371094 -30.81667969 57.44242187 -31.33398438 58.12109375 C-32.5657645 59.74000478 -33.78422728 61.36903345 -35 63 C-31.535 61.02 -31.535 61.02 -28 59 C-28 61 -28 61 -30 63.125 C-30.99934037 64.08402117 -31.99945602 65.04223462 -33 66 C-34.44015957 67.4348355 -35.87755101 68.8724535 -37.3125 70.3125 C-38.54166667 71.54166667 -39.77083333 72.77083333 -41 74 C-37.60541977 71.15324828 -34.25327381 68.32845827 -31.1875 65.125 C-29 63 -29 63 -27 63 C-28.58624618 66.88101189 -31.08133268 69.29576219 -34.05078125 72.2109375 C-34.54660202 72.7015567 -35.04242279 73.1921759 -35.55326843 73.69766235 C-37.13498127 75.26162513 -38.72321291 76.81873768 -40.3125 78.375 C-41.89023178 79.92493353 -43.4664109 81.47636621 -45.03959656 83.03091431 C-46.47402266 84.44762679 -47.91327 85.85945287 -49.3527832 87.27099609 C-52.07404561 90.07633329 -54.53687521 92.96850464 -57 96 C-57.66 95.67 -58.32 95.34 -59 95 C-56.72559051 90.71727764 -54.45100376 86.43464949 -52.17626953 82.15209961 C-51.40636689 80.7025797 -50.63650838 79.25303635 -49.86669922 77.8034668 C-44.58795082 67.86354906 -39.29967867 57.9287747 -34 48 C-34.62366455 47.9575415 -35.2473291 47.91508301 -35.88989258 47.87133789 C-43.92684848 47.24088837 -51.76549511 45.90362532 -59.6875 44.4375 C-61.61625977 44.08655273 -61.61625977 44.08655273 -63.58398438 43.72851562 C-66.72346852 43.15663933 -69.86207986 42.58038572 -73 42 C-73 41.34 -73 40.68 -73 40 C-72.39341553 39.67427002 -71.78683105 39.34854004 -71.16186523 39.01293945 C-59.92126531 32.96939079 -48.71497609 26.87887136 -37.625 20.5625 C-29.60161976 16.00631603 -21.55267466 11.49960652 -13.449646 7.0866394 C-11.71369909 6.13929739 -9.98205446 5.18408542 -8.25048828 4.22875977 C-7.20231934 3.66084717 -6.15415039 3.09293457 -5.07421875 2.5078125 C-4.14182373 1.99879395 -3.20942871 1.48977539 -2.2487793 0.96533203 C-1.13563354 0.48749268 -1.13563354 0.48749268 0 0 Z "
          fill="#4D73FC"
          transform="translate(207,257)"
        />
        <path
          d="M0 0 C1.7482484 3.4964968 1.22708836 7.46048055 1.25 11.3125 C1.270625 12.16779297 1.29125 13.02308594 1.3125 13.90429688 C1.34253172 18.75066611 1.22290385 22.10691287 -2 26 C-5.58752667 28.39168445 -8.76525392 28.95205948 -13 29 C-18.36585366 27.63414634 -18.36585366 27.63414634 -20 26 C-20.04063832 24.33382885 -20.042721 22.66611905 -20 21 C-16.90521121 19.96840374 -15.47368607 20.02517138 -12.3125 20.4375 C-11.50425781 20.53933594 -10.69601562 20.64117187 -9.86328125 20.74609375 C-9.24839844 20.82988281 -8.63351562 20.91367187 -8 21 C-8 20.34 -8 19.68 -8 19 C-9.8253125 19.12375 -9.8253125 19.12375 -11.6875 19.25 C-15.03116277 19.25592848 -15.9543162 19.02818788 -18.9375 17.1875 C-21.63032062 14.33147813 -21.96164342 12.51781389 -22.25 8.625 C-21.9180558 3.81180912 -20.35600281 1.35600281 -17 -2 C-10.94926065 -4.24101457 -5.38755042 -3.33515026 0 0 Z M-11 4 C-13.28728734 5.83883881 -13.28728734 5.83883881 -13.125 8.625 C-13.08375 9.40875 -13.0425 10.1925 -13 11 C-11.02 11.99 -11.02 11.99 -9 13 C-7.79438816 12.01732141 -7.79438816 12.01732141 -7.90234375 10.15234375 C-7.91394531 9.42144531 -7.92554688 8.69054687 -7.9375 7.9375 C-7.958125 6.638125 -7.97875 5.33875 -8 4 C-8.99 4 -9.98 4 -11 4 Z "
          fill="#F9FAFD"
          transform="translate(535,371)"
        />
        <path
          d="M0 0 C0.66 0.33 1.32 0.66 2 1 C1.36908447 1.41886475 0.73816895 1.83772949 0.08813477 2.26928711 C-2.75453855 4.15749766 -5.59603311 6.04747451 -8.4375 7.9375 C-9.92733398 8.9265332 -9.92733398 8.9265332 -11.44726562 9.93554688 C-12.39150391 10.56396484 -13.33574219 11.19238281 -14.30859375 11.83984375 C-15.18314209 12.42113037 -16.05769043 13.00241699 -16.95874023 13.60131836 C-18.90281634 14.84160869 -18.90281634 14.84160869 -20 16 C-19.34 16.33 -18.68 16.66 -18 17 C-23.75 22 -23.75 22 -26 22 C-26 22.66 -26 23.32 -26 24 C-25.23300781 24.03738281 -24.46601563 24.07476562 -23.67578125 24.11328125 C-15.98111277 24.56906301 -8.3847865 25.38863992 -0.75 26.4375 C0.17901123 26.55971924 1.10802246 26.68193848 2.06518555 26.80786133 C2.93570557 26.93185303 3.80622559 27.05584473 4.703125 27.18359375 C5.48333008 27.29243896 6.26353516 27.40128418 7.06738281 27.51342773 C9 28 9 28 11 30 C0.54224859 40.63076568 0.54224859 40.63076568 -3.875 44.375 C-9.93393665 49.53396907 -15.41587652 55.33926507 -21 61 C-21.66 60.67 -22.32 60.34 -23 60 C-22.20335937 59.22076172 -22.20335937 59.22076172 -21.390625 58.42578125 C-17.68949647 54.77192991 -14.12841559 51.17122079 -11 47 C-11.99 47.495 -11.99 47.495 -13 48 C-14.33333333 48.66666667 -15.66666667 49.33333333 -17 50 C-15.5729101 48.09721346 -14.14434133 46.19587627 -12.70703125 44.30078125 C-11.60959409 42.82162681 -10.54146537 41.32002083 -9.51171875 39.79296875 C-9.03347656 39.09816406 -8.55523437 38.40335937 -8.0625 37.6875 C-7.64097656 37.05199219 -7.21945313 36.41648437 -6.78515625 35.76171875 C-5 34 -5 34 2 31 C-12.19 29.02 -26.38 27.04 -41 25 C-38.47469845 22.47469845 -36.73923686 21.12978999 -33.7109375 19.43359375 C-32.43343628 18.71175903 -32.43343628 18.71175903 -31.13012695 17.9753418 C-30.22093506 17.467854 -29.31174316 16.96036621 -28.375 16.4375 C-20.09153614 11.77669388 -20.09153614 11.77669388 -11.90234375 6.953125 C-11.1252002 6.48592041 -10.34805664 6.01871582 -9.54736328 5.53735352 C-8.07969105 4.65088205 -6.61567884 3.75831685 -5.15576172 2.85913086 C-3.47184721 1.84608291 -1.73978998 0.91376423 0 0 Z "
          fill="#054CB2"
          transform="translate(188,271)"
        />
        <path
          d="M0 0 C3.15025072 2.29902824 4.81569569 4.84151577 5.4375 8.75 C5 11 5 11 3 13 C0.3984375 13.6328125 0.3984375 13.6328125 -2.625 14.125 C-3.62789063 14.29257812 -4.63078125 14.46015625 -5.6640625 14.6328125 C-6.43492187 14.75398438 -7.20578125 14.87515625 -8 15 C-4.07854549 16.17730202 -1.03122755 15.60848718 3 15 C4 16 4 16 4.25 18.4375 C4.12625 19.7059375 4.12625 19.7059375 4 21 C-0.47064104 23.98042736 -4.75866179 23.60649771 -10 23 C-13.60911206 21.2904206 -15.34561921 20.1005495 -17.375 16.6875 C-18.53425377 11.70270878 -18.66893665 8.31309786 -16.3125 3.6875 C-11.78977371 -1.56864137 -6.4612918 -2.00966038 0 0 Z M-8 6 C-8.33 6.66 -8.66 7.32 -9 8 C-7.35 8 -5.7 8 -4 8 C-4 7.34 -4 6.68 -4 6 C-5.32 6 -6.64 6 -8 6 Z "
          fill="#F9FAFD"
          transform="translate(488,369)"
        />
        <path
          d="M0 0 C5.15625 2.15625 5.15625 2.15625 7 4 C7.18023553 6.80694683 7.27807437 9.56586827 7.3125 12.375 C7.34150391 13.15617187 7.37050781 13.93734375 7.40039062 14.7421875 C7.46374193 20.43405901 7.46374193 20.43405901 5.3515625 23.01171875 C0.71239288 24.96140299 -4.07916129 24.59076918 -9 24 C-12.25 22.4375 -12.25 22.4375 -14 20 C-14.5 16.4375 -14.5 16.4375 -14 13 C-10.9290127 8.93118402 -6.77289934 8.8992419 -2 8 C-5.3 8 -8.6 8 -12 8 C-12.33 6.35 -12.66 4.7 -13 3 C-8.84376688 -0.11717484 -5.06934103 -0.76238137 0 0 Z M-5 15 C-5 15.99 -5 16.98 -5 18 C-3.68 17.67 -2.36 17.34 -1 17 C-1 16.34 -1 15.68 -1 15 C-2.32 15 -3.64 15 -5 15 Z "
          fill="#F9FAFD"
          transform="translate(565,368)"
        />
        <path
          d="M0 0 C1.17426264 2.34852528 1.11508173 3.73774065 1.09765625 6.3515625 C1.09443359 7.20234375 1.09121094 8.053125 1.08789062 8.9296875 C1.07951172 9.81914062 1.07113281 10.70859375 1.0625 11.625 C1.05798828 12.5221875 1.05347656 13.419375 1.04882812 14.34375 C1.03702591 16.56256648 1.02056155 18.78125018 1 21 C-4.75 21.125 -4.75 21.125 -7 20 C-7.31241371 17.45058627 -7.51303421 14.99638487 -7.625 12.4375 C-7.66367187 11.72658203 -7.70234375 11.01566406 -7.7421875 10.28320312 C-7.83671783 8.52257575 -7.91945817 6.76132272 -8 5 C-8.99 5 -9.98 5 -11 5 C-11.06058594 6.07121094 -11.12117188 7.14242188 -11.18359375 8.24609375 C-11.26798537 9.64324391 -11.35263406 11.04037857 -11.4375 12.4375 C-11.47681641 13.14455078 -11.51613281 13.85160156 -11.55664062 14.58007812 C-11.88671875 19.88671875 -11.88671875 19.88671875 -13 21 C-15.9375 21.1875 -15.9375 21.1875 -19 21 C-22.14266226 17.85733774 -21.36834455 14.33862641 -21.375 10.0625 C-21.39949219 9.23814453 -21.42398437 8.41378906 -21.44921875 7.56445312 C-21.47874264 1.50713433 -21.47874264 1.50713433 -19.08984375 -1.0234375 C-12.48068924 -4.11182746 -6.26408135 -3.87776464 0 0 Z "
          fill="#F9FAFD"
          transform="translate(466,371)"
        />
        <path
          d="M0 0 C5.53846154 3.07692308 5.53846154 3.07692308 7 6 C7.04022391 8.3329866 7.04320247 10.66706666 7 13 C3.01939223 14.17076699 -0.91621717 15.25749403 -5 16 C-1.40863469 17.24316491 1.31517639 16.65507975 5 16 C6 17 6 17 6.25 19.4375 C6.12625 20.7059375 6.12625 20.7059375 6 22 C1.5424425 24.971705 -2.77413182 24.75294249 -8 24 C-11.17568542 22.34766078 -13.37696485 20.24607029 -15 17 C-15.51436888 12.91444146 -15.92098732 8.78152373 -13.98828125 5.04296875 C-9.95016399 0.05898618 -6.18649929 -0.5242796 0 0 Z M-6 7 C-6.33 7.66 -6.66 8.32 -7 9 C-5.02 9 -3.04 9 -1 9 C-1.33 8.34 -1.66 7.68 -2 7 C-3.32 7 -4.64 7 -6 7 Z "
          fill="#F9FAFD"
          transform="translate(435,368)"
        />
        <path
          d="M0 0 C-1.54572776 3.81628832 -3.88771245 5.97025743 -6.9375 8.6875 C-7.42621582 9.12465332 -7.91493164 9.56180664 -8.41845703 10.01220703 C-11.66485692 12.89222899 -14.99608503 15.6510289 -18.375 18.375 C-23.80746663 22.7582778 -28.89553219 27.45255198 -33.99609375 32.2109375 C-36.96882678 34.98252208 -40.00484163 37.6724591 -43.078125 40.33203125 C-46.75017722 43.51895462 -50.37021243 46.76511988 -54 50 C-54 45.94734288 -52.60690294 45.20514584 -49.79663086 42.3449707 C-48.87824936 41.40422195 -47.95986786 40.46347321 -47.01365662 39.49421692 C-45.99807057 38.47072495 -44.98178189 37.44792979 -43.96484375 36.42578125 C-42.92770864 35.37646843 -41.89072853 34.32700241 -40.85389709 33.27738953 C-38.6760897 31.07708491 -36.4918883 28.88334859 -34.30395508 26.69311523 C-31.50472726 23.88860969 -28.72923319 21.06182604 -25.95903683 18.22868061 C-23.8235863 16.05231224 -21.67245592 13.89197347 -19.51669502 11.73573875 C-18.48675334 10.70041708 -17.46254305 9.65936031 -16.44431877 8.61251259 C-15.0153626 7.14678802 -13.56578265 5.70497844 -12.10913086 4.2668457 C-11.28972519 3.44094437 -10.47031952 2.61504303 -9.62608337 1.76411438 C-6.25513496 -0.50037525 -3.97752152 -0.33348754 0 0 Z "
          fill="#094EB6"
          transform="translate(209,299)"
        />
        <path
          d="M0 0 C0.99 0.66 1.98 1.32 3 2 C2.67 3.65 2.34 5.3 2 7 C-0.31 7.33 -2.62 7.66 -5 8 C-5 13.28 -5 18.56 -5 24 C-7.31 24 -9.62 24 -12 24 C-13 23 -13 23 -13.11352539 21.05053711 C-13.10567017 19.8015564 -13.10567017 19.8015564 -13.09765625 18.52734375 C-13.09443359 17.62822266 -13.09121094 16.72910156 -13.08789062 15.80273438 C-13.07951172 14.85720703 -13.07113281 13.91167969 -13.0625 12.9375 C-13.05798828 11.98810547 -13.05347656 11.03871094 -13.04882812 10.06054688 C-13.0370011 7.70696935 -13.02052025 5.35351523 -13 3 C-5.04307044 -0.57307619 -5.04307044 -0.57307619 0 0 Z "
          fill="#F9FAFD"
          transform="translate(509,368)"
        />
        <path
          d="M0 0 C0.33 0.66 0.66 1.32 1 2 C-3.33333333 6.33333333 -7.66666667 10.66666667 -12 15 C-8.60541977 12.15324828 -5.25327381 9.32845827 -2.1875 6.125 C0 4 0 4 2 4 C0.41375382 7.88101189 -2.08133268 10.29576219 -5.05078125 13.2109375 C-5.54660202 13.7015567 -6.04242279 14.1921759 -6.55326843 14.69766235 C-8.13498127 16.26162513 -9.72321291 17.81873768 -11.3125 19.375 C-12.89023178 20.92493353 -14.4664109 22.47636621 -16.03959656 24.03091431 C-17.47402266 25.44762679 -18.91327 26.85945287 -20.3527832 28.27099609 C-23.07404561 31.07633329 -25.53687521 33.96850464 -28 37 C-28.66 36.67 -29.32 36.34 -30 36 C-29.06915029 34.22566188 -28.13005387 32.45564851 -27.1875 30.6875 C-26.66542969 29.70136719 -26.14335937 28.71523438 -25.60546875 27.69921875 C-24 25 -24 25 -22.54296875 23.546875 C-19.34875223 20.34457185 -17.38972691 16.01876462 -15.1328125 12.12890625 C-11.90643775 7.39570813 -7.88800856 4.82989969 -3 2 C-2.01 1.34 -1.02 0.68 0 0 Z "
          fill="#4A71F8"
          transform="translate(178,316)"
        />
        <path
          d="M0 0 C2.33294775 -0.04241723 4.66702567 -0.04092937 7 0 C8 1 8 1 8.11352539 3.13305664 C8.10828857 4.04949951 8.10305176 4.96594238 8.09765625 5.91015625 C8.09443359 6.89951172 8.09121094 7.88886719 8.08789062 8.90820312 C8.07951172 9.94912109 8.07113281 10.99003906 8.0625 12.0625 C8.05798828 13.10728516 8.05347656 14.15207031 8.04882812 15.22851562 C8.03699913 17.8190666 8.02051689 20.40950559 8 23 C5.66705225 23.04241723 3.33297433 23.04092937 1 23 C0 22 0 22 -0.11352539 19.86694336 C-0.10828857 18.95050049 -0.10305176 18.03405762 -0.09765625 17.08984375 C-0.09443359 16.10048828 -0.09121094 15.11113281 -0.08789062 14.09179688 C-0.07951172 13.05087891 -0.07113281 12.00996094 -0.0625 10.9375 C-0.05798828 9.89271484 -0.05347656 8.84792969 -0.04882812 7.77148438 C-0.03699913 5.1809334 -0.02051689 2.59049441 0 0 Z "
          fill="#F9FAFD"
          transform="translate(540,369)"
        />
        <path
          d="M0 0 C0.66 0.33 1.32 0.66 2 1 C1.31035156 1.73863281 0.62070313 2.47726562 -0.08984375 3.23828125 C-4.72830847 8.23553142 -9.28034116 13.2520091 -13.5625 18.5625 C-16.74374865 22.48051898 -19.9395435 26.37809762 -23.25 30.1875 C-24.43335938 31.57001953 -24.43335938 31.57001953 -25.640625 32.98046875 C-28 35 -28 35 -30.796875 35.30078125 C-31.52390625 35.20152344 -32.2509375 35.10226562 -33 35 C-33 32 -33 32 -31.65820312 30.30175781 C-31.03880859 29.69170898 -30.41941406 29.08166016 -29.78125 28.453125 C-28.75257813 27.4321875 -28.75257813 27.4321875 -27.703125 26.390625 C-26.97609375 25.68421875 -26.2490625 24.9778125 -25.5 24.25 C-24.80390625 23.5590625 -24.1078125 22.868125 -23.390625 22.15625 C-19.31729833 18.14326891 -15.12532664 14.31776599 -10.79882812 10.58056641 C-8.43353768 8.50226967 -6.20861235 6.30562191 -4 4.0625 C-3.236875 3.29035156 -2.47375 2.51820313 -1.6875 1.72265625 C-1.130625 1.15417969 -0.57375 0.58570313 0 0 Z "
          fill="#074DB4"
          transform="translate(206,259)"
        />
        <path
          d="M0 0 C0.66 0.33 1.32 0.66 2 1 C-5.87818037 5.66326833 -13.77055626 10.29972381 -21.70703125 14.86328125 C-22.28283936 15.19443436 -22.85864746 15.52558746 -23.4519043 15.86677551 C-26.32880471 17.52085777 -29.20712698 19.17235081 -32.08740234 20.82055664 C-38.43119852 24.43073337 -38.43119852 24.43073337 -44.51953125 28.4453125 C-47 30 -47 30 -51 30 C-51 29.34 -51 28.68 -51 28 C-50.39341553 27.67427002 -49.78683105 27.34854004 -49.16186523 27.01293945 C-36.46880895 20.18847245 -23.83622374 13.27405666 -11.31420898 6.13989258 C-10.41130127 5.62579834 -9.50839355 5.1117041 -8.578125 4.58203125 C-7.39331543 3.90491089 -7.39331543 3.90491089 -6.18457031 3.21411133 C-5.46366211 2.81345459 -4.74275391 2.41279785 -4 2 C-3.28682617 1.59612061 -2.57365234 1.19224121 -1.83886719 0.77612305 C-1.23204102 0.52000244 -0.62521484 0.26388184 0 0 Z "
          fill="#39B1FF"
          transform="translate(185,269)"
        />
        <path
          d="M0 0 C1.32 0 2.64 0 4 0 C2.66791835 3.54115656 1.09757457 6.72983011 -0.828125 9.984375 C-1.38113281 10.92023438 -1.93414062 11.85609375 -2.50390625 12.8203125 C-3.08011719 13.78710938 -3.65632812 14.75390625 -4.25 15.75 C-5.09111328 17.17699219 -5.09111328 17.17699219 -5.94921875 18.6328125 C-9.45734001 24.54719708 -13.11995386 30.32265729 -17 36 C-17.33 35.34 -17.66 34.68 -18 34 C-16.7977989 31.38426369 -15.53339667 28.89198615 -14.16015625 26.3671875 C-13.75921249 25.61535187 -13.35826874 24.86351624 -12.94517517 24.08889771 C-11.65841544 21.68018106 -10.36061905 19.2776106 -9.0625 16.875 C-8.19002372 15.24648543 -7.31826928 13.61758392 -6.44726562 11.98828125 C-4.30653801 7.98764366 -2.1558914 3.99248497 0 0 Z "
          fill="#39B1FF"
          transform="translate(173,305)"
        />
        <path
          d="M0 0 C2.9375 0.1875 2.9375 0.1875 3.9375 1.1875 C4.125 4.125 4.125 4.125 3.9375 7.1875 C3.2775 7.8475 2.6175 8.5075 1.9375 9.1875 C-1.1875 8.8125 -1.1875 8.8125 -4.0625 8.1875 C-4.6875 5.3125 -4.6875 5.3125 -5.0625 2.1875 C-3.0625 0.1875 -3.0625 0.1875 0 0 Z "
          fill="#F9FAFD"
          transform="translate(544.0625,358.8125)"
        />
        <path
          d="M0 0 C0.66 0.33 1.32 0.66 2 1 C-4.33347009 7.13886626 -11.23519694 12.11034062 -20 14 C-20 13.01 -20 12.02 -20 11 C-16.7155241 9.13287101 -13.42136129 7.28355226 -10.125 5.4375 C-8.71927734 4.63795898 -8.71927734 4.63795898 -7.28515625 3.82226562 C-6.38925781 3.32275391 -5.49335938 2.82324219 -4.5703125 2.30859375 C-3.74289551 1.84251709 -2.91547852 1.37644043 -2.06298828 0.89624023 C-1.38220215 0.60048096 -0.70141602 0.30472168 0 0 Z "
          fill="#4785FC"
          transform="translate(207,257)"
        />
        <path
          d="M0 0 C6.95041086 -0.26618595 13.23514355 0.3879491 20 2 C20 2.33 20 2.66 20 3 C17.79194476 3.0544452 15.58349446 3.09299283 13.375 3.125 C12.14523438 3.14820313 10.91546875 3.17140625 9.6484375 3.1953125 C6.05683959 3.0030428 3.33338825 2.30258556 0 1 C0 0.67 0 0.34 0 0 Z "
          fill="#4C76FC"
          transform="translate(177,295)"
        />
        <path
          d="M0 0 C0.66 0.66 1.32 1.32 2 2 C-4.435 7.94 -4.435 7.94 -11 14 C-11 11 -11 11 -8.59375 8.30078125 C-7.5700032 7.29697757 -6.5383946 6.30114351 -5.5 5.3125 C-4.97535156 4.80138672 -4.45070312 4.29027344 -3.91015625 3.76367188 C-2.61339096 2.50227292 -1.30753883 1.25022788 0 0 Z "
          fill="#1152BE"
          transform="translate(166,335)"
        />
        <path
          d="M0 0 C0.99 0.33 1.98 0.66 3 1 C-0.96 4.96 -4.92 8.92 -9 13 C-9.66 12.67 -10.32 12.34 -11 12 C-10.45730469 11.46890625 -9.91460937 10.9378125 -9.35546875 10.390625 C-8.64003906 9.68421875 -7.92460937 8.9778125 -7.1875 8.25 C-6.47980469 7.55390625 -5.77210938 6.8578125 -5.04296875 6.140625 C-3.17724121 4.18571355 -1.56830358 2.19661447 0 0 Z "
          fill="#1654C3"
          transform="translate(176,319)"
        />
        <path
          d="M0 0 C0.66 0.33 1.32 0.66 2 1 C-2.296875 5.00390625 -2.296875 5.00390625 -4 6 C-6.203125 5.65234375 -6.203125 5.65234375 -8 5 C-6.71475739 4.13619741 -5.42157581 3.28419631 -4.125 2.4375 C-3.04605469 1.72400391 -3.04605469 1.72400391 -1.9453125 0.99609375 C-1.30335938 0.66738281 -0.66140625 0.33867187 0 0 Z "
          fill="#3664E3"
          transform="translate(198,265)"
        />
        <path
          d="M0 0 C0.66 0.33 1.32 0.66 2 1 C-0.64 3.97 -3.28 6.94 -6 10 C-6.33 9.01 -6.66 8.02 -7 7 C-4.69 4.69 -2.38 2.38 0 0 Z "
          fill="#1755C4"
          transform="translate(206,259)"
        />
        <path
          d="M0 0 C0.66 0.33 1.32 0.66 2 1 C0.02 2.32 -1.96 3.64 -4 5 C-4.99 4.34 -5.98 3.68 -7 3 C-4.69631264 1.93347808 -2.35981813 0.93578995 0 0 Z "
          fill="#0F51BC"
          transform="translate(168,287)"
        />
      </svg>
    );
  };

export default IconExample3;