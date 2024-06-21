/**
 *
 * @param {Object} props - Propiedades para renderizar el tipo de texto
 * @param {ReactNode} props.children - Este componente acepta el anidamiento de contenido, utilizando dos etiquetas `<Modal></Modal>`
 * @param {(isVisible: boolean) => void} props.setIsModalVisible Función para asignar la visibilidad del Modal
 *
 * @returns {JSX.Element} Elemento | Estructura HTML
 */

const Contact = () => {
  return (
    <>
      <form onSubmit={handleSubmitForm}>
        <label htmlFor="nameID">Email</label>
        <input
          type="text"
          name="name"
          id="nameID"
          ref={inputRef}
          onChange={handleInputOnChangeText}
          value={user.email}
          autoComplete="off"
        />

        <label htmlFor="passwordID">Password</label>
        <input
          type="password"
          name="password"
          id="passwordID"
          onChange={handleInputOnChangeText}
          value={user.password}
          autoComplete="off"
        />

        <button type="submit" name="login" id="loginID" disabled={isDisabled}>
          SEND
        </button>

        <button
          type="reset"
          name="reset"
          id="resetID"
          onClick={handleResetForm}>
          RESET
        </button>
      </form>
    </>
  );
};

export { Contact };
