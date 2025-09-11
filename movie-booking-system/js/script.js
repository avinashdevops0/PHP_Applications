document.addEventListener('DOMContentLoaded', function() {
    // Sample movie data
    const movies = [
        {
            id: 1,
            title: 'Avengers: Endgame',
            poster: 'https://images.unsplash.com/photo-1594909122845-11baa439b7bf?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80',
            description: 'The epic conclusion to the Infinity Saga.',
            genre: 'action'
        },
        {
            id: 2,
            title: 'The Batman',
            poster: 'https://images.unsplash.com/photo-1489599163802-44c6c52c693f?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80',
            description: 'The Dark Knight of Gotham City sets out to dismantle the criminal underworld.',
            genre: 'action'
        },
        {
            id: 3,
            title: 'Dune',
            poster: 'https://images.unsplash.com/photo-1560972550-aba3456b5564?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80',
            description: 'A noble family becomes embroiled in a war for control over the galaxy\'s most valuable asset.',
            genre: 'sci-fi'
        },
        {
            id: 4,
            title: 'Spider-Man: No Way Home',
            poster: 'https://images.unsplash.com/photo-1635805737707-575885ab0820?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80',
            description: 'With Spider-Man\'s identity now revealed, Peter asks Doctor Strange for help.',
            genre: 'action'
        },
        {
            id: 5,
            title: 'Top Gun: Maverick',
            poster: 'https://images.unsplash.com/photo-1596727147705-61a532a659bd?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80',
            description: 'After thirty years, Maverick is still pushing the envelope as a top naval aviator.',
            genre: 'action'
        },
        {
            id: 6,
            title: 'Black Panther: Wakanda Forever',
            poster: 'https://images.unsplash.com/photo-1672756440599-ba891bc5b6a2?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80',
            description: 'The nation of Wakanda is pitted against intervening world powers.',
            genre: 'action'
        }
    ];

    // Load movies on dashboard
    if (document.getElementById('movieList')) {
        loadMovies(movies, 'movieList');
        
        // Add event listeners for search and filter
        document.getElementById('searchInput').addEventListener('input', filterMovies);
        document.getElementById('genreFilter').addEventListener('change', filterMovies);
    }
    
    // Load movies on homepage
    if (document.getElementById('now-showing')) {
        loadMovies(movies.slice(0, 3), 'now-showing');
    }

    function loadMovies(movies, elementId) {
        const movieList = document.getElementById(elementId);
        movieList.innerHTML = '';
        
        movies.forEach(movie => {
            const movieCard = document.createElement('div');
            movieCard.className = 'col-md-4 mb-4';
            movieCard.innerHTML = `
                <div class="card movie-card">
                    <img src="${movie.poster}" class="card-img-top movie-poster" alt="${movie.title}">
                    <div class="card-body">
                        <h5 class="card-title">${movie.title}</h5>
                        <p class="card-text">${movie.description}</p>
                        <a href="booking.php?id=${movie.id}" class="btn btn-primary">Book Now</a>
                    </div>
                </div>
            `;
            movieList.appendChild(movieCard);
        });
    }

    function filterMovies() {
        const searchText = document.getElementById('searchInput').value.toLowerCase();
        const genre = document.getElementById('genreFilter').value;
        
        const filteredMovies = movies.filter(movie => {
            const matchesSearch = movie.title.toLowerCase().includes(searchText) || 
                                movie.description.toLowerCase().includes(searchText);
            const matchesGenre = genre === '' || movie.genre === genre;
            
            return matchesSearch && matchesGenre;
        });
        
        loadMovies(filteredMovies, 'movieList');
    }
});