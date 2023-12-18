import './bootstrap';

var apiToken = document.querySelector('meta[name="token"]').getAttribute('content');
var quotesContainer = document.getElementById('quotes');
var btn = document.getElementById('generate');
var spinner = document.getElementById('spinner');

function getQuotes(fresh = false) {
    btn.disabled = true;
    btn.classList.add('cursor-not-allowed');
    spinner.classList.remove('hidden');
    axios.defaults.headers.common['Authorization'] = apiToken;
    axios.get('/api/quotes', {
        params: {
            fresh: fresh
        }
    })
    .then(response => {
        // console.log(response.data)
        response.data.data.forEach(quote => {
            quotesContainer.innerHTML += `
                <div class="w-full p-6 mb-4 rounded-md bg-white text-gray-900 shadow">
                    <p class="mb-0">
                        ${quote}
                    </p>
                </div>
            `;
        });

        btn.disabled = false;
        btn.classList.remove('cursor-not-allowed');
        spinner.classList.add('hidden');
    })
    .catch(error => {
        btn.disabled = false;
        btn.classList.remove('cursor-not-allowed');
        spinner.classList.add('hidden');

        quotesContainer.innerHTML = `
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded shadow" role="alert">
                <strong class="font-bold">Error!</strong><br>
                <span class="block sm:inline" id="error-message">There was an error processing this request. Please try again later.</span>
            </div>
        `;

        console.log(error);        
    });
}

getQuotes();

btn.addEventListener('click', function() {
    quotesContainer.innerHTML = '';
    getQuotes(true);
});