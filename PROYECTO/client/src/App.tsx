import "./App.css";
import "./sass/for-app.scss";
import { BrowserRouter, Routes, Route } from "react-router-dom";
import { Nav } from "./components/08_Nav/Nav";
import { Dev } from "./pages/01_Dev/Dev";
import { Header } from "./components/07_Header/Header";
import { Footer } from "./components/11_Footer/Footer";
import { Aside } from "./components/09_Aside/Aside";

function App() {
  return (
    <BrowserRouter>
      <Header />
      <Nav />
      <Aside />
      <Routes>
        <Route path="/dev" element={<Dev />} />
        <Route path="/" element={"<Home />"} />
      </Routes>
      <Footer />
    </BrowserRouter>
  );
}

export default App;
