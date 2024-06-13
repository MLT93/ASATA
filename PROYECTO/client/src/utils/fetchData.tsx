import axios from "axios";
import { Dispatch, SetStateAction } from "react";

/* GET */
const axiosData = (
  url: string,
  setData: Dispatch<SetStateAction<unknown>>,
  setIsPending: Dispatch<SetStateAction<boolean>>,
  setError: Dispatch<SetStateAction<string | null>>,
): void => {
  setIsPending(true);
  axios
    .get(url)
    .then((response) => setData(response.data))
    .catch((err) => {
      err instanceof Error
        ? setError(err.message)
        : console.error("Error desconocido");
    })
    .finally(() => setIsPending(false));
};

/* FORMA DE USO GET */
/* 
    import React, { useState, useEffect } from "react";
    import { fetchData } from "./fetchData"; // Asegúrate de ajustar la ruta según sea necesario

    const MyComponent: React.FC = () => {
      const [isPending, setIsPending] = useState<boolean>(false);
      const [data, setData] = useState<any>(null);
      const [error, setError] = useState<string | null>(null);

      useEffect(() => {
        const url = "https://api.example.com/data"; // Cambia la URL según sea necesario
        fetchData(url, setData, setIsPending, setError);
      }, []);

      if (isPending) return <div>Loading...</div>;
      if (error) return <div>Error: {error}</div>;

      return (
        <div>
          <h1>Data:</h1>
          <pre>{JSON.stringify(data, null, 2)}</pre>
        </div>
      );
    };

    export default MyComponent;
*/

const fetchDataPOST = async (URL: string | URL | Request, data: undefined) => {
  try {
    const response = await fetch(URL, {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify([data]),
    });

    // const data: unknown = await response.json();
    console.log(response);
    return response;
  } catch (err) {
    err instanceof Error
      ? console.error(err.message)
      : console.error("Error desconocido");
  } finally {
    console.log(`La petición ha finalizado`);
  }
};

export { axiosData, fetchDataPOST };
