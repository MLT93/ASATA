import { Box } from "../05_PageStructure/Box/Box";
import styles from "./Modal.module.scss";
import { ReactNode } from "react";

/**
 *
 * @param {Object} props - Propiedades para renderizar el tipo de texto
 * @param {ReactNode} props.children - Este componente acepta el anidamiento de contenido, utilizando dos etiquetas `<Modal></Modal>`
 * @param {(isVisible: boolean) => void} props.setIsModalVisible Función para asignar la visibilidad del Modal
 *
 * @returns {JSX.Element} Elemento | Estructura HTML
 */

const Modal = ({
  children,
  setIsModalVisible,
}: {
  children: ReactNode;
  setIsModalVisible: (isVisible: boolean) => void;
}): JSX.Element => {
  return (
    <>
      <Box className={styles.modal_container}>
        <Box
          isFlexRowCenter
          alignItems="center"
          textAlign="center"
          className={styles.modal_content}>
          <Box
            isFlexColCenter
            gap="1"
            alignItems="center"
            className={styles.blur}>
            {children}
          </Box>
        </Box>
        <Box
          className={styles.modal_close}
          onClick={() => setIsModalVisible(false)}>
          {/* <h3 style={{ color: "white" }}>Contenedor externo</h3> */}
        </Box>
      </Box>
    </>
  );
};

export { Modal };
