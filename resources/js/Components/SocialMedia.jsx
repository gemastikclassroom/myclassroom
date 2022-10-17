import React from 'react';

function SocialMedia(){
    return (
        <div>
            <h1 className='text-5xl text-center my-10 uppercase'>Contoh komponen React</h1>
            <ul className='flex justify-around mt-10'>
                <li>
                    <a href="https://www.instagram.com/malvinn.val" className='border-2 p-5'>
                        Instagram
                    </a>
                </li>
                <li>
                    <a href="https://www.github.com/malvinval" className='border-2 p-5'>
                        Github
                    </a>
                </li>
                <li>
                    <a href="https://www.linkedin.com/in/malvinval/" className='border-2 p-5'>
                        LinkedIn
                    </a>
                </li>
            </ul>
        </div>
    );
}

export default SocialMedia;