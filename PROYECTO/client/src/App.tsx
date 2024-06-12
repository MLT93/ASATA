import "./App.css";
import "./sass/for-app.scss";
import { BrowserRouter, Routes, Route } from "react-router-dom";
import { Dev } from "./pages/Developer/Dev";
import { Nav } from "./components/06_Nav/Nav";

function App() {
  return (
    <BrowserRouter>
      <Nav />
      <Routes>
        <Route path="/dev" element={<Dev />} />
        <Route path="/" element={"<Home />"} />
      </Routes>
      {/* <Footer /> */}
    </BrowserRouter>
  );
}

export default App;
