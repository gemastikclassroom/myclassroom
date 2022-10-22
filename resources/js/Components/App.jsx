import React from "react";
import { createRoot } from "react-dom/client";
import { BrowserRouter, Route, Routes } from "react-router-dom";
import Beranda from "./beranda/Beranda";
import DetailKelas from "./kelas/DetailKelas";

render(function MyApp() {
    return (
        <Routes>
            <Route path="*" element={<>Halaman Tidak Ditemukan</>} />
            <Route path="/" element={<Beranda />} />
            {/* <Route path="/tugas" element={<NavBar /> } /> */}
            <Route path="/kelas/:idKelas" element={<DetailKelas />} />
        </Routes>
    );
});

export default MyApp;

if (document.getElementById("beranda")) {
    createRoot(document.getElementById("beranda")).render(
        <BrowserRouter>
            <MyApp />
        </BrowserRouter>
    );
}
