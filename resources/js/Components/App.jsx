import React from 'react';
import { createRoot } from 'react-dom/client';
import SocialMedia from './SocialMedia';

export default function App(){
    return (
        <SocialMedia />
    );
}

if(document.getElementById('root')){
    createRoot(document.getElementById('root')).render(<App />)
}