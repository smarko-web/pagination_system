const loadMoreBtn = document.querySelector('.load-more-btn');
const postList = document.querySelector('.post-list');
const paginationLinks = document.querySelector('.pagination-links');


function displayPosts(posts) {       //posts is an array
    posts.forEach(post => {         // Does for ever post
        let postHtmlString = `
            <article>
                <h3>${post.title}</h3>
            </article>
         `;

         const domParser = new DOMParser();         //Allows string to become html string/node
         const doc = domParser.parseFromString(postHtmlString, 'text/html');     //reture as document
         const postNode = doc.body.firstChild;
        postList.appendChild(postNode);
    });
}

let nextPage = 2;

loadMoreBtn.addEventListener('click', async function(e) {
    loadMoreBtn.textContent = 'Loading...'; 
    const response = await fetch(`index.php?page=${nextPage}&ajax=1`);
    const data = await response.json();
    displayPosts(data.posts);
    nextPage = data.nextPage;
    if (!data.nextPage) {
        const paginationLinks = document.querySelector('.pagination-links');
        paginationLinks.innerHTML = '<div style="color: gray;">No more posts to display</div>';
    } else {
        loadMoreBtn.textContent = 'Load more'; 
    }

});