const reviews = [
    {
      id: 1,
      name: 'Dra. Aline Souza',
      job: 'Médica pediatra ',
      img: 'https://img.freepik.com/free-photo/portrait-expressive-young-woman_1258-48167.jpg?w=740&t=st=1697942859~exp=1697943459~hmac=67a9cf993bda0f2b3aa8084e9f15ec525aa8d838e2aba799c18229b112841caf',
      text: "Como pediatra, é vital que os pais encontrem especialistas rapidamente para cuidar de seus filhos. Este site de agendamento de consultas tem sido um recurso incrível para minha prática. Ele permite que os pais localizem pediatras especializados em suas proximidades com facilidade. Isso torna o processo de atendimento às crianças muito mais eficiente e conveniente. Estou muito grato por esta plataforma.",
    },
    {
      id: 2,
      name: 'Monique Andrade',
      job: 'Paciente',
      img: 'https://img.freepik.com/free-photo/portrait-beautiful-dark-hair-young-woman-with-natural-make-up-tenderly-smiles_295783-1501.jpg?w=740&t=st=1697942888~exp=1697943488~hmac=79cfa16f2a25cdae0e8629c9d1c4226bca3ffda2a7ab0cda867ef63781e330ba',
      text: 'O site de agendamento de consultas é um verdadeiro salva-vidas! Encontrar um médico especialista nas proximidades nunca foi tão simples. O Dr. Santos foi muito profissional e competente. Graças a este serviço, estou recebendo o tratamento de que preciso sem o estresse de ligações telefônicas intermináveis.',
    },
    {
      id: 3,
      name: ' Guilherme Pacheco',
      job: 'Paciente',
      img: 'https://images.pexels.com/photos/614810/pexels-photo-614810.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',
      text: ' Agendar consultas por meio deste site é incrivelmente prático. Encontrar o médico especialista mais próximo de casa é uma bênção, economizando tempo precioso. Além disso, a opção de comparar os preços dos especialistas me permitiu encontrar um profissional de qualidade que não sobrecarrega o meu bolso. Esta plataforma tornou o acesso aos cuidados de saúde muito mais acessível e eficiente.',
    },
    {
      id: 4,
      name: 'Gabriel Belgo',
      job: 'Médico Oftamologista',
      img: 'https://img.freepik.com/free-photo/handsome-confident-smiling-man-with-hands-crossed-chest_176420-18743.jpg?w=740&t=st=1697942956~exp=1697943556~hmac=3d3201db0067a4661fbffa1fdbc1842752fc8412f1c8cde5af1433376b052647',
      text: 'Como médico especialista, esta plataforma é uma dádiva. Ela torna o agendamento de consultas uma experiência simples e rápida para os pacientes. Ao encontrarem facilmente especialistas próximos, os pacientes têm um acesso mais ágil ao tratamento. Além disso, a opção de comparar preços beneficia tanto os pacientes quanto os médicos, tornando os cuidados de saúde de qualidade mais acessíveis a todos. Estou satisfeito em fazer parte de uma solução que melhora o acesso aos cuidados de saúde.',
    },
  ];
  // select items
  const img = document.getElementById('person-img');
  const author = document.getElementById('author');
  const job = document.getElementById('job');
  const info = document.getElementById('info');
  
  const prevBtn = document.querySelector('.prev-btn');
  const nextBtn = document.querySelector('.next-btn');
  const randomBtn = document.querySelector('.random-btn');
  
  // set starting item
  let currentItem = 0;
  
  // load initial item
  window.addEventListener('DOMContentLoaded', function () {
    const item = reviews[currentItem];
    img.src = item.img;
    author.textContent = item.name;
    job.textContent = item.job;
    info.textContent = item.text;
  });
  
  // show person based on item
  function showPerson(person) {
    const item = reviews[person];
    img.src = item.img;
    author.textContent = item.name;
    job.textContent = item.job;
    info.textContent = item.text;
  }
  // show next person
  nextBtn.addEventListener('click', function () {
    currentItem++;
    if (currentItem > reviews.length - 1) {
      currentItem = 0;
    }
    showPerson(currentItem);
  });
  // show prev person
  prevBtn.addEventListener('click', function () {
    currentItem--;
    if (currentItem < 0) {
      currentItem = reviews.length - 1;
    }
    showPerson(currentItem);
  });
  // show random person
  randomBtn.addEventListener('click', function () {
    console.log('hello');
  
    currentItem = Math.floor(Math.random() * reviews.length);
    showPerson(currentItem);
  });

  function zoomIn(card) {
    card.style.transform = "scale(1.2)"; // Aumenta o tamanho do card
    card.style.transition = "transform 0.3s"; // Adiciona uma transição suave
}

function zoomOut(card) {
    card.style.transform = "scale(1)"; // Retorna ao tamanho original
}
