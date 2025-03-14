document.addEventListener('DOMContentLoaded', () => {
    // ... (код форми відправлення даних залишається без змін) ...

    // Галерея зображень
    const gallery = document.getElementById('gallery');
    const refreshBtn = document.getElementById('refreshBtn');

    const loadImages = () => {
        const clientId = 'YOUR_UNSPLASH_ACCESS_KEY'; // Замініть на свій ключ доступу
        fetch(`https://api.unsplash.com/photos/random?count=10&client_id=${clientId}`)
            .then(response => {
                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }
                return response.json();
            })
            .then(data => {
                const images = data.map(item => ({
                    download_url: item.urls.regular,
                    author: item.user.name
                }));
                localStorage.setItem('galleryData', JSON.stringify(images));
                sessionStorage.setItem('galleryData', JSON.stringify(images));
                displayImages(images);
            })
            .catch(error => {
                alert('Помилка завантаження зображень: ' + error.message);
                console.error('Помилка:', error);
            });
    };

    const displayImages = (images) => {
        gallery.innerHTML = '';
        images.forEach(image => {
            const img = document.createElement('img');
            img.src = image.download_url;
            img.alt = image.author;
            gallery.appendChild(img);
        });
    };

    const refreshGallery = () => {
        const cachedData = localStorage.getItem('galleryData');
        if (cachedData) {
            displayImages(JSON.parse(cachedData));
        } else {
            loadImages();
        }
    };

    refreshBtn.addEventListener('click', refreshGallery);
    refreshGallery();
});