const articles = [
  {
    title: "Why Language Matters in Education",
    info: "Informations",
    text: `Imagine opening a textbook and not understanding a single word. That’s the daily reality for millions of learners around the world. In this blog, we explore how language can be the bridge — or the barrier — to knowledge, and how multilingual education changes lives.`,
    img: "../assets/img/blog-img-03.jpeg",
    alt: "Why Language Matters"
  },
  {
    title: "Building an Encyclopedia for the World",
    info: "Informations",
    text: `What if every child, in every country, could access trusted information in their native language? That’s not just a dream — it’s our mission. This post shows how our multilingual encyclopedia is changing the way the world learns.`,
    img: "../assets/img/blog-img-01.jpeg",
    alt: "Building an Encyclopedia"
  },
  {
    title: "How You Can Help Us Share Knowledge",
    info: "Informations",
    text: `You don’t need a PhD to make a difference. Whether you speak Swahili, Hindi, French, or Filipino — your words have power. Learn how you can contribute, translate, or edit articles and join a growing global knowledge community.`,
    img: "../assets/img/blog-img-05.jpeg",
    alt: "How You Can Help"
  },
  {
    title: "The Power of Community-Curated Knowledge",
    info: "Informations",
    text: `The internet is full of information — but not all of it is accessible, and not all of it is true. Our platform relies on real people from real communities to refine articles. This helps truth travel far — and stay accurate.`,
    img: "../assets/img/blog-img-04.jpeg",
    alt: "Power of Community Knowledge"
  },
  {
    title: "The Future of Space Exploration",
    info: "Informations",
    text: `🚀 The future of space exploration is not far away. Technology is advancing faster than ever, unlocking possibilities we once thought were science fiction. From Mars missions to lunar habitats, each breakthrough brings us closer to a new era. In this post, we explore how innovation is propelling us forward.`,
    img: "../assets/img/services.jpg",
    alt: "Space Exploration"
  },
  {
    title: "The Green Revolution and Sustainability",
    info: "Informations",
    text: `🌱 The Green Revolution — How sustainability is reshaping the future of global industries and economies. From renewable energy to eco-friendly innovations, change is underway. Businesses must adapt or risk falling behind. In this post, we explore the path to a greener tomorrow.`,
    img: "../assets/img/tree-architecture-sky-mansion-house-building-1007350-pxhere.com-edit.jpg",
    alt: "Green Revolution"
  }
];


  // Fisher-Yates shuffle
  function shuffleArray(arr) {
    for (let i = arr.length - 1; i > 0; i--) {
      const j = Math.floor(Math.random() * (i + 1));
      [arr[i], arr[j]] = [arr[j], arr[i]];
    }
  }

  // Update cards with current articles order
  function updateCards() {
    articles.forEach((article, idx) => {
      const i = idx + 1;
      document.getElementById(`title${i}`).textContent = article.title;
      document.getElementById(`info${i}`).textContent = article.info;
      document.getElementById(`text${i}`).textContent = article.text;
      const imgEl = document.getElementById(`img${i}`);
      imgEl.src = article.img;
      imgEl.alt = article.alt;
    });
  }

  // Shuffle then update
  function shuffleAndUpdate() {
    shuffleArray(articles);
    updateCards();
  }

  // Initial populate on load
  document.addEventListener('DOMContentLoaded', updateCards);