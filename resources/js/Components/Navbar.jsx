import React from 'react';
import { createRoot } from 'react-dom/client';

class Navbar extends React.Component {
    componentDidMount() {
        const btn = document.querySelector("button.mobile-menu-button");
        const menu = document.querySelector(".mobile-menu");
    
        btn.addEventListener("click", () => {
            menu.classList.toggle("hidden");
        });
    }

    render() {
        const navbar = (
            <nav className="bg-white dark:bg-gray-900 shadow-lg">
                <div className="max-w-6xl mx-auto px-4 py-3">
                    <div className="flex justify-between">
                        <div className="flex space-x-7">
                            <div>
                                {/* <!-- Website Logo (OPTIONAL) --> */}
                                <a href="#" className="flex items-center py-4 px-2">
                                    <img src="img/logo-example.png" alt="Logo" className="h-14 w-14 mr-2 rounded-full" />
                                </a>
                            </div>

                            {/* <!-- Primary Navbar items --> */}
                            <div className="hidden md:flex items-center space-x-1">
                                <a href="#" className="py-4 px-2 text-slate-500 dark:text-gray-300 font-semibold">Hosa</a>
                                <a href="#" className="py-4 px-2 text-slate-500 dark:text-gray-300 font-semibold">Classes</a>
                                <a href="#" className="py-4 px-2 text-slate-500 dark:text-gray-300 font-semibold">Assignments</a>
                            </div>
                            
                        </div>

                        {/* <!-- Dropdown items --> */}
                        <div className="hidden md:flex dropdown items-center">
                            <label tabIndex="0" className="btn text-slate-500 dark:text-gray-300 bg-transparent border-none hover:bg-transparent ">Menu</label>
                            <ul tabIndex="0" className="dropdown-content rounded-lg menu p-2 shadow bg-base-100 w-52 mt-40">
                                <li><a>Dashboard</a></li>
                                <li><a>Logout</a></li>
                            </ul>
                        </div>

                        {/* <!-- Mobile menu button --> */}
                        <div className="md:hidden flex items-center">
                            <button className="outline-none mobile-menu-button">
                                <svg className=" w-6 h-6 text-gray-500 hover:text-green-500 "
                                    fill="none"
                                    strokeLinecap="round"
                                    strokeLinejoin="round"
                                    strokeWidth="2"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                >
                                    <path d="M4 6h16M4 12h16M4 18h16"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                {/* <!-- Mobile menu --> */}
                <div className="hidden mobile-menu">
                    <ul className="">
                        <li className="active"><a href="index.html" className="block text-sm px-2 py-4 text-white bg-green-500 font-semibold">Ho</a></li>
                        <li><a href="#services" className="block text-sm px-2 py-4 hover:bg-green-500 transition duration-300">Services</a></li>
                        <li><a href="#about" className="block text-sm px-2 py-4 hover:bg-green-500 transition duration-300">About</a></li>
                        <li><a href="#contact" className="block text-sm px-2 py-4 hover:bg-green-500 transition duration-300">Contact Us</a></li>
                    </ul>
                </div>
			
		    </nav>
        );

        return navbar;
    }
}

if(document.getElementById('nav')){
    createRoot(document.getElementById('nav')).render(<Navbar />)
}