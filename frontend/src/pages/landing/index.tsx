import React, { useEffect, useRef, useState } from 'react';
import { Dropdown } from 'react-bootstrap';
import { Link } from 'react-router-dom';
import FeatherIcon from 'feather-icons-react';

// components
import Tagline from './Tagline';
import NavBar from './NavBar';
import Hero from './Hero';
import Footer from './Footer';

import profileImg from '../../assets/images/users/avatar-1.jpg';

const Landing = () => {

    useEffect(() => {
        if (document.body) {
            document.body.classList.remove('authentication-bg');
            document.body.classList.add('pb-0');
        }

        return () => {
            if (document.body) document.body.classList.remove('pb-0');
        };
    }, []);

    const ProfileMenus = [
        {
            label: 'My Account',
            icon: 'user',
            redirectTo: '/pages/profile',
        },
        {
            label: 'Settings',
            icon: 'settings',
            redirectTo: '/',
        },
        {
            label: 'Support',
            icon: 'help-circle',
            redirectTo: '/',
        },
        {
            label: 'Lock Screen',
            icon: 'lock',
            redirectTo: '/auth/lock-screen',
        },
        {
            label: 'Logout',
            icon: 'log-out',
            redirectTo: '/auth/logout',
        },
    ];

    const [dropdownOpen, setDropdownOpen] = useState<boolean>(false);

    /*
     * toggle dropdown
     */
    const toggleDropdown = () => {
        setDropdownOpen(!dropdownOpen);
    };

    return (
        <div className="landing">
            {/* tagline */}
            <Tagline />

            {/* navbar */}
            <NavBar />

            {/* hero */}
            <Hero />

            {/* footer */}
            <Footer />
        </div>
    );
};

export default Landing;
