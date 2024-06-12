import "./App.css";
import "./sass/for-app.scss";
import { BrowserRouter, Routes, Route } from "react-router-dom";
import { Nav } from "./components/07_Nav/Nav";
import { Dev } from "./pages/Developer/Dev";
import { Header } from "./components/06_Header/Header";
import { Footer } from "./components/08_Footer/Footer";

function App() {
  return (
    <BrowserRouter>
      <Header />
      <Nav />
      <Routes>
        <Route path="/dev" element={<Dev />} />
        <Route path="/" element={"<Home />"} />
      </Routes>
      <Footer />
    </BrowserRouter>
  );
}

export default App;
