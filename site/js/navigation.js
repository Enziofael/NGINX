// js/navigation.js
(function() {
    // Ждем полной загрузки DOM
    document.addEventListener('DOMContentLoaded', function() {
        console.log('DOM fully loaded');
        
        // ищем my-content
        const originalMyContent = document.querySelector('.my-content');
        
        if (!originalMyContent) {
            console.error('my-content not found! Check if element exists with class "my-content"');
            console.log('Available classes in body:', document.body.innerHTML);
            return;
        }
        
        console.log('Found my-content:', originalMyContent);
        
        // Создаем контейнер для навигации
        const navContainer = document.createElement('div');
        navContainer.className = 'nav-container';
        
        // Определяем текущую страницу
        const currentPage = window.location.pathname.split('/').pop() || 'lab0.html';
        
        // Массив с ссылками
        const labs = [
            { name: 'Lab1', url: 'lab1.html' },
            { name: 'Lab2', url: 'lab2.html' },
            { name: 'Lab3', url: 'lab3.html' },
            { name: 'Lab4', url: 'lab4.html' },
            { name: 'Lab5', url: 'lab5.php' },
            { name: 'Lab6', url: 'lab6.php' },
            { name: 'Lab7', url: 'lab7.php' },
            { name: 'Lab8', url: 'lab8.php' },
            { name: 'Lab9', url: 'lab9.php' },
            { name: 'Lab10', url: 'lab10.html' },
            { name: 'Lab11', url: 'lab11.php' },
            { name: 'Lab12', url: 'lab12.php' },
            { name: 'Lab13', url: 'lab13.php' },
            { name: 'Lab14', url: 'lab14.php' },
            { name: 'Lab15', url: 'lab15.php' },
            { name: 'Lab16', url: 'lab16' }
        ];
        
        // Формируем навигацию
        let navHTML = '<div class="nav-links">';
        labs.forEach(lab => {
            const isActive = currentPage === lab.url;
            navHTML += `
                <a href="${lab.url}" class="nav-link ${isActive ? 'active' : ''}">
                    <h1>${lab.name}</h1>
                </a>
            `;
        });
        navHTML += '</div>';
        
        navContainer.innerHTML = navHTML;
        
        // Сохраняем родителя оригинального контента
        const originalParent = originalMyContent.parentNode;
        
        // Создаем красивый контейнер для контента
        const contentWrapper = document.createElement('div');
        contentWrapper.className = 'content-wrapper';
        
        // Вставляем навигацию ПЕРЕД оригинальным контентом
        originalParent.insertBefore(navContainer, originalMyContent);
        
        // Заменяем originalMyContent на contentWrapper, а my-content помещаем внутрь
        originalParent.replaceChild(contentWrapper, originalMyContent);
        contentWrapper.appendChild(originalMyContent);
        
        console.log('Navigation and wrapper inserted successfully');
        console.log('Final structure:', document.body.innerHTML);

        // Добавляем обработчик клика на nav-container для перехода на /
        navContainer.style.cursor = 'pointer';
        navContainer.addEventListener('click', function(e) {
            // Проверяем, что клик был не по внутренним ссылкам
            if (!e.target.closest('a')) {
                window.location.href = '/';
            }
        });
    });
})();