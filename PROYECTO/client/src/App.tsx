import "./App.css";
import "./styles/main.scss";
import { BrowserRouter, Routes, Route } from "react-router-dom";
import { Dev } from "./pages/Developer/Dev";

function App() {
  return (
    <BrowserRouter>
      {/* <Nav /> */}
      <Routes>
        <Route path="/dev" element={<Dev />} />
        <Route path="/" element={"<Home />"} />
      </Routes>
      {/* <Footer /> */}
    </BrowserRouter>
  );
}

export default App;
