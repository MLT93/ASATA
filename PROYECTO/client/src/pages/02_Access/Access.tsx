import styles from "./Access.module.scss";
import { useState } from "react";
import { Section } from "../../components/05_PageStructure/Section/Section";
import { Box } from "../../components/05_PageStructure/Box/Box";
import { Text } from "../../components/01_Text/Text";
import { Button } from "../../components/03_Button/Button";
import { Modal } from "../../components/11_Modal/Modal";
import { OldForm } from "../../components/12_Form/OldForm";
import { Form } from "../../components/12_Form/Form";

/**
 *
 * @param {Object} props - Propiedades para renderizar el tipo de texto
 * @param {string} props.any - ToDo Por hacer...
 *
 * @returns {JSX.Element} Elemento | Estructura HTML
 */

const Access = (): JSX.Element => {
  const [isModalVisible, setIsModalVisible] = useState<boolean>(false);

  return (
    <>
      <main className={styles.access}>
        <Section bg="var(--color-contrast-3)">
          <Box maxWidth="1100" isFlexColCenter gap="1" alignItems="center">
            <Text size="h1" text="ACCESS" />
            {/* Formulario de LOGIN */}
            {/* Botón de REGISTRO (para el Modal) */}
            {/* Modal que abre Formulario REGISTER */}
            <Button text={"Old Form"} onClick={() => setIsModalVisible(true)} />
            {isModalVisible ? (
              <Modal setIsModalVisible={setIsModalVisible}>
                {/* <Text size={"h3"} text={"Contenedor interno"} /> */}
                <OldForm />
              </Modal>
            ) : null}
            <Button text={"Form"} onClick={() => setIsModalVisible(true)} />
            {isModalVisible ? (
              <Modal setIsModalVisible={setIsModalVisible}>
                {/* <Text size={"h3"} text={"Contenedor interno"} /> */}
                <Form />
              </Modal>
            ) : null}
          </Box>
        </Section>
      </main>
    </>
  );
};

export default Access;
