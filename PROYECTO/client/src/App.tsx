import "./App.css";
import "./sass/for-app.scss";
import { BrowserRouter, Routes, Route } from "react-router-dom";
import { Nav } from "./components/08_Nav/Nav";
import { Header } from "./components/07_Header/Header";
import { Footer } from "./components/10_Footer/Footer";
import { Aside } from "./components/09_Aside/Aside";
import Dev from "./pages/01_Dev/Dev";
import Access from "./pages/02_Access/Access";

function App() {
  return (
    <BrowserRouter>
      <Header />
      <Nav />
      <Aside />
      <Routes>
        <Route path="/dev" element={<Dev />} />
        <Route path="/access" element={<Access />} />
        <Route path="/" element={"<Home />"} />
      </Routes>
      <Footer />
    </BrowserRouter>
  );
}

export default App;
