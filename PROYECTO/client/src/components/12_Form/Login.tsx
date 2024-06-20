import { ChangeEvent, useEffect, useRef, useState } from "react";

const Login = (): JSX.Element => {
  const [user, setUser] = useState({ email: "", password: "" });

  const handleInputOnChangeText = (evt: ChangeEvent<HTMLInputElement>) => {
    const { name, value, type, checked } = evt.target;
    type === "checkbox"
      ? setUser({ ...user, [name]: checked })
      : setUser({ ...user, [name]: value });
  };

  const [isDisabled, setIsDisabled] = useState(true);
  useEffect(() => {
    const isFilled = user.email.trim() !== "" && user.password.trim() !== "";
    setIsDisabled(!isFilled);
  }, [user, setIsDisabled]);

  const inputRef = useRef<HTMLInputElement>(null);
  useEffect(() => {
    inputRef.current?.focus();
  }, []);

  const handleResetForm = () => {
    setUser({ email: "", password: "" });
    inputRef.current?.focus();
  };

  const handleSubmitForm = (event: { preventDefault: () => void }) => {
    event.preventDefault();

    if (user.email && user.password) {
      const URL = "/api/login.php";
      const formData = new FormData();
      console.log(user);
      formData.append("email", user.email);
      formData.append("password", user.password);

      void (async (URL) => {
        try {
          const response = await fetch(URL, {
            // No necesito poner `headers` porque FormData lo hace automáticamente
            method: "POST",
            body: formData,
          });

          const data: unknown = await response.json();
          if (response.ok) {
            console.log("Login successful:", data);
          } else {
            console.error("Login failed:", data);
          }
        } catch (error) {
          if (error instanceof Error) {
            console.error("Error obtenido:", error.message);
          } else {
            console.error("Error desconocido");
          }
        }
      })(URL);
    } else {
      console.error(`No se ha introducido ni usuario, ni contraseña`);
    }
  };

  return (
    <>
      <form onSubmit={handleSubmitForm}>
        <label htmlFor="emailID">Email</label>
        <input
          type="text"
          name="email"
          id="emailID"
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

export { Login };
