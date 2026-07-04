--
-- PostgreSQL database dump
--

\restrict obwylUOZ0gDe4uP8MB2mzBJS6sridExi2bUcsMl1Ur8srDQEhXekue9bQdU4U2n

-- Dumped from database version 15.18 (Debian 15.18-0+deb12u1)
-- Dumped by pg_dump version 15.18 (Debian 15.18-0+deb12u1)

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- Name: categories; Type: TABLE; Schema: public; Owner: nygts
--

CREATE TABLE public.categories (
    id integer NOT NULL,
    name character varying(50) NOT NULL,
    creation_date timestamp without time zone DEFAULT CURRENT_TIMESTAMP,
    description character varying(250) NOT NULL
);


ALTER TABLE public.categories OWNER TO nygts;

--
-- Name: category_id_seq; Type: SEQUENCE; Schema: public; Owner: nygts
--

CREATE SEQUENCE public.category_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.category_id_seq OWNER TO nygts;

--
-- Name: category_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: nygts
--

ALTER SEQUENCE public.category_id_seq OWNED BY public.categories.id;


--
-- Name: publications; Type: TABLE; Schema: public; Owner: nygts
--

CREATE TABLE public.publications (
    id integer NOT NULL,
    title character varying(255) NOT NULL,
    resume text NOT NULL,
    about text NOT NULL,
    user_id integer NOT NULL,
    category_id integer NOT NULL,
    creation_date timestamp without time zone DEFAULT CURRENT_TIMESTAMP,
    content text
);


ALTER TABLE public.publications OWNER TO nygts;

--
-- Name: publication_id_seq; Type: SEQUENCE; Schema: public; Owner: nygts
--

CREATE SEQUENCE public.publication_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.publication_id_seq OWNER TO nygts;

--
-- Name: publication_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: nygts
--

ALTER SEQUENCE public.publication_id_seq OWNED BY public.publications.id;


--
-- Name: users; Type: TABLE; Schema: public; Owner: nygts
--

CREATE TABLE public.users (
    id integer NOT NULL,
    name character varying(100),
    age character varying(10),
    sex character varying(20),
    phone character varying(50),
    email character varying(100) NOT NULL,
    avatar character varying(255),
    data_cadastro timestamp without time zone DEFAULT CURRENT_TIMESTAMP,
    password character varying(255) NOT NULL,
    type character varying(20) DEFAULT 'comum'::character varying
);


ALTER TABLE public.users OWNER TO nygts;

--
-- Name: users_id_seq; Type: SEQUENCE; Schema: public; Owner: nygts
--

CREATE SEQUENCE public.users_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.users_id_seq OWNER TO nygts;

--
-- Name: users_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: nygts
--

ALTER SEQUENCE public.users_id_seq OWNED BY public.users.id;


--
-- Name: categories id; Type: DEFAULT; Schema: public; Owner: nygts
--

ALTER TABLE ONLY public.categories ALTER COLUMN id SET DEFAULT nextval('public.category_id_seq'::regclass);


--
-- Name: publications id; Type: DEFAULT; Schema: public; Owner: nygts
--

ALTER TABLE ONLY public.publications ALTER COLUMN id SET DEFAULT nextval('public.publication_id_seq'::regclass);


--
-- Name: users id; Type: DEFAULT; Schema: public; Owner: nygts
--

ALTER TABLE ONLY public.users ALTER COLUMN id SET DEFAULT nextval('public.users_id_seq'::regclass);


--
-- Data for Name: categories; Type: TABLE DATA; Schema: public; Owner: nygts
--

COPY public.categories (id, name, creation_date, description) FROM stdin;
24	Software Livre	2026-06-27 02:52:02.773319	Programas e sistemas com código aberto, distribuídos sob licenças livres como GPL, MIT, Apache, etc.
25	Linux	2026-06-27 02:52:02.773319	Distribuições Linux, comandos, configurações, kernel e sistemas baseados no núcleo Linux.
26	Programação	2026-06-27 02:52:02.773319	Linguagens de programação, desenvolvimento de software, boas práticas e engenharia de software.
27	Banco de Dados	2026-06-27 02:52:02.773319	SGBDs, SQL, NoSQL, modelagem de dados, otimização e administração de bancos.
28	Redes	2026-06-27 02:52:02.773319	Infraestrutura de rede, protocolos, segurança, switches, roteadores e cabeamento estruturado.
29	Segurança da Informação	2026-06-27 02:52:02.773319	Cibersegurança, pentest, criptografia, firewalls, antivírus e boas práticas de segurança.
30	DevOps	2026-06-27 02:52:02.773319	Cultura DevOps, CI/CD, automação, containers, Kubernetes, Docker e integração contínua.
31	Cloud Computing	2026-06-27 02:52:02.773319	Computação em nuvem, AWS, Azure, Google Cloud, serviços em nuvem e arquitetura cloud.
32	Inteligência Artificial	2026-06-27 02:52:02.773319	Machine Learning, Deep Learning, Redes Neurais, NLP e automação com IA.
33	Front-end	2026-06-27 02:52:02.773319	Desenvolvimento Web com HTML, CSS, JavaScript, React, Vue, Angular e UX/UI.
34	Back-end	2026-06-27 02:52:02.773319	Desenvolvimento server-side com Python, PHP, Java, Node.js, APIs REST e microsserviços.
35	Mobile	2026-06-27 02:52:02.773319	Desenvolvimento para dispositivos móveis, Android, iOS, Flutter, React Native e apps híbridos.
36	Sistemas Operacionais	2026-06-27 02:52:02.773319	Windows, macOS, Linux, Unix, gerenciamento de processos, memória e arquivos.
37	Hardware	2026-06-27 02:52:02.773319	Componentes físicos, montagem de computadores, manutenção, overclock e infraestrutura.
38	Open Source	2026-06-27 02:52:02.773319	Projetos open source, comunidades, contribuições e filosofia do código aberto.
\.


--
-- Data for Name: publications; Type: TABLE DATA; Schema: public; Owner: nygts
--

COPY public.publications (id, title, resume, about, user_id, category_id, creation_date, content) FROM stdin;
\.


--
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: nygts
--

COPY public.users (id, name, age, sex, phone, email, avatar, data_cadastro, password, type) FROM stdin;
20	lindao	\N	\N	\N	mygu@gmail.com	\N	2026-06-26 01:35:08.25373	$2y$12$w88swiPLoAeE4leBY5.X3u67HYv9RfMZJAI9PbyxtoiokigYRQ53K	admin
13	soucomum	\N	\N	\N	comum@gmail.com	\N	2026-06-27 02:13:25.382333	$2y$12$wgMX0UDNOxNfNTA.vORhGuKVfEdscaYM0rRTxal77gTRB5E2EW9uq	comum
\.


--
-- Name: category_id_seq; Type: SEQUENCE SET; Schema: public; Owner: nygts
--

SELECT pg_catalog.setval('public.category_id_seq', 42, true);


--
-- Name: publication_id_seq; Type: SEQUENCE SET; Schema: public; Owner: nygts
--

SELECT pg_catalog.setval('public.publication_id_seq', 1, false);


--
-- Name: users_id_seq; Type: SEQUENCE SET; Schema: public; Owner: nygts
--

SELECT pg_catalog.setval('public.users_id_seq', 13, true);


--
-- Name: categories category_pkey; Type: CONSTRAINT; Schema: public; Owner: nygts
--

ALTER TABLE ONLY public.categories
    ADD CONSTRAINT category_pkey PRIMARY KEY (id);


--
-- Name: publications publication_pkey; Type: CONSTRAINT; Schema: public; Owner: nygts
--

ALTER TABLE ONLY public.publications
    ADD CONSTRAINT publication_pkey PRIMARY KEY (id);


--
-- Name: users users_pkey; Type: CONSTRAINT; Schema: public; Owner: nygts
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);


--
-- PostgreSQL database dump complete
--

\unrestrict obwylUOZ0gDe4uP8MB2mzBJS6sridExi2bUcsMl1Ur8srDQEhXekue9bQdU4U2n

