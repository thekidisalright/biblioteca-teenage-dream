USE db_biblioteca;

INSERT INTO tb_editora (nm_editora, ds_editora) VALUES
('Rocco', 'Líder em publicações literárias, oferece uma vasta gama de obras de renomados autores nacionais e internacionais.'),
('Companhia das Letras', 'Uma das editoras mais renomadas do Brasil, com um catálogo diversificado de autores brasileiros e estrangeiros.'),
('Intrínseca', 'Especializada em best-sellers e livros de ficção, é conhecida por lançar grandes sucessos literários.'),
('Globo Livros', 'Parte do Grupo Globo, publica uma ampla variedade de gêneros, incluindo ficção, não-ficção e livros de referência.'),
('Editora Record', 'Uma das editoras mais antigas e respeitadas do país, com um histórico de publicações premiadas.'),
('Objetiva', 'Focada em literatura de qualidade, tem em seu catálogo autores de renome e obras premiadas.'),
('Leya', 'Uma editora que oferece uma ampla gama de gêneros, incluindo literatura, não-ficção, e-books e educação.'),
('Saraiva', 'Conhecida principalmente por suas publicações educacionais, a Saraiva também oferece uma variedade de títulos de entretenimento.'),
('Novo Século', 'Especializada em literatura brasileira e estrangeira, com uma abordagem para autores estreantes.'),
('Editora Sextante', 'Famosa por seus livros de desenvolvimento pessoal e autoajuda, além de romances e best-sellers.'),
('DarkSide Books', 'Editora focada em livros de terror e suspense, com edições caprichadas e ilustrações impressionantes.'),
('Gutenberg', 'Especializada em literatura infantojuvenil, oferece uma ampla variedade de livros para jovens leitores.'),
('Cia das Letras', 'Uma das maiores editoras do Brasil, com um catálogo diversificado que inclui obras literárias e de não-ficção.'),
('Martins Fontes', 'Editora com tradição em publicações acadêmicas e obras de referência.'),
('Editora 34', 'Conhecida por suas edições de qualidade de obras literárias e de ensaios críticos.')
('José Olympio', 'A Editora José Olympio é uma das editoras mais antigas do Brasil, fundada em 1931. Ela é um dos pilares da cultura brasileira e publica obras de importância literária ímpar. A editora é responsável pela publicação de clássicos mundiais como "O Sol é Para Todos" e "O Menino do Dedo Verde".')
('Editorial Presença', 'A Editorial Presença é uma editora independente portuguesa que publica mais de 100 novos títulos por ano. Fundada em 1960, a editora é composta por quatro chancelas: Presença, Marcador, Jacarandá e Manuscrito. A editora publica obras de diversas áreas, incluindo apoio escolar, arte, culinária, história, economia, gestão, literatura infantil, saúde e família. A Editorial Presença tem um sólido compromisso com a difusão da literatura e publica alguns dos mais notáveis autores contemporâneos, apostando também na divulgação de novos valores da ficção portuguesa.');

-- Adicione aqui mais editoras populares conforme necessário



INSERT INTO tb_livro (nm_livro, ds_livro, cd_editora, isbn10, isbn13) VALUES
('Jogos Vorazes', 'Num futuro distópico, Katniss Everdeen luta pela sobrevivência ao participar dos brutais Jogos Vorazes, um evento mortal criado pelo governo. Enquanto enfrenta adversários, ela desafia o sistema e se torna um símbolo de resistência.', 1, '655532144X', '9786555321449'),
('O Sol é para todo', 'Clássico da literatura americana, "O Sol é Para Todos" de Harper Lee é um livro sobre racismo e injustiça. A história se passa nos anos 1930, quando um advogado defende um homem negro acusado de estuprar uma mulher branca. O livro é narrado pela filha do advogado, Scout, e aborda temas como tolerância, perda da inocência e conceito de justiça.', 16, '8503009498', '9788503009492'),
(, '9722325337', '9789722325332')