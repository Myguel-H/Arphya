--
-- PostgreSQL database dump
--

\restrict gFZJewU61gwFdgyNGC8idatSnt2HdLNUocBPtoeLUBAkagWdkYwfg4uVAuOwwYi

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

--
-- Name: public; Type: SCHEMA; Schema: -; Owner: postgres
--

-- *not* creating schema, since initdb creates it


ALTER SCHEMA public OWNER TO postgres;

--
-- Name: SCHEMA public; Type: COMMENT; Schema: -; Owner: postgres
--

COMMENT ON SCHEMA public IS '';


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
    type character varying(20) DEFAULT 'comum'::character varying,
    about text
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
-- Name: SCHEMA public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE USAGE ON SCHEMA public FROM PUBLIC;
GRANT ALL ON SCHEMA public TO nygts;


--
-- PostgreSQL database dump complete
--

\unrestrict gFZJewU61gwFdgyNGC8idatSnt2HdLNUocBPtoeLUBAkagWdkYwfg4uVAuOwwYi

