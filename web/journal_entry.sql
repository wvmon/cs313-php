--
-- PostgreSQL database dump
--

-- Dumped from database version 9.6.1
-- Dumped by pg_dump version 9.6.1

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;
SET row_security = off;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: history; Type: TABLE; Schema: public; Owner: fzkvjudcofublc
--

CREATE TABLE history (
    id integer NOT NULL,
    entry_id integer,
    history_time timestamp without time zone NOT NULL,
    entry text NOT NULL,
    expiration_date date NOT NULL
);


ALTER TABLE history OWNER TO fzkvjudcofublc;

--
-- Name: history_id_seq; Type: SEQUENCE; Schema: public; Owner: fzkvjudcofublc
--

CREATE SEQUENCE history_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE history_id_seq OWNER TO fzkvjudcofublc;

--
-- Name: history_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: fzkvjudcofublc
--

ALTER SEQUENCE history_id_seq OWNED BY history.id;


--
-- Name: journal; Type: TABLE; Schema: public; Owner: fzkvjudcofublc
--

CREATE TABLE journal (
    id integer NOT NULL,
    user_id integer,
    title character varying(40) NOT NULL,
    entry_date date NOT NULL,
    entry text NOT NULL,
    attachments text
);


ALTER TABLE journal OWNER TO fzkvjudcofublc;

--
-- Name: journal_id_seq; Type: SEQUENCE; Schema: public; Owner: fzkvjudcofublc
--

CREATE SEQUENCE journal_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE journal_id_seq OWNER TO fzkvjudcofublc;

--
-- Name: journal_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: fzkvjudcofublc
--

ALTER SEQUENCE journal_id_seq OWNED BY journal.id;


--
-- Name: users; Type: TABLE; Schema: public; Owner: fzkvjudcofublc
--

CREATE TABLE users (
    id integer NOT NULL,
    username character varying(40) NOT NULL,
    passwrod character varying(40) NOT NULL
);


ALTER TABLE users OWNER TO fzkvjudcofublc;

--
-- Name: users_id_seq; Type: SEQUENCE; Schema: public; Owner: fzkvjudcofublc
--

CREATE SEQUENCE users_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE users_id_seq OWNER TO fzkvjudcofublc;

--
-- Name: users_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: fzkvjudcofublc
--

ALTER SEQUENCE users_id_seq OWNED BY users.id;


--
-- Name: history id; Type: DEFAULT; Schema: public; Owner: fzkvjudcofublc
--

ALTER TABLE ONLY history ALTER COLUMN id SET DEFAULT nextval('history_id_seq'::regclass);


--
-- Name: journal id; Type: DEFAULT; Schema: public; Owner: fzkvjudcofublc
--

ALTER TABLE ONLY journal ALTER COLUMN id SET DEFAULT nextval('journal_id_seq'::regclass);


--
-- Name: users id; Type: DEFAULT; Schema: public; Owner: fzkvjudcofublc
--

ALTER TABLE ONLY users ALTER COLUMN id SET DEFAULT nextval('users_id_seq'::regclass);


--
-- Data for Name: history; Type: TABLE DATA; Schema: public; Owner: fzkvjudcofublc
--

COPY history (id, entry_id, history_time, entry, expiration_date) FROM stdin;
\.


--
-- Name: history_id_seq; Type: SEQUENCE SET; Schema: public; Owner: fzkvjudcofublc
--

SELECT pg_catalog.setval('history_id_seq', 1, false);


--
-- Data for Name: journal; Type: TABLE DATA; Schema: public; Owner: fzkvjudcofublc
--

COPY journal (id, user_id, title, entry_date, entry, attachments) FROM stdin;
\.


--
-- Name: journal_id_seq; Type: SEQUENCE SET; Schema: public; Owner: fzkvjudcofublc
--

SELECT pg_catalog.setval('journal_id_seq', 1, false);


--
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: fzkvjudcofublc
--

COPY users (id, username, passwrod) FROM stdin;
\.


--
-- Name: users_id_seq; Type: SEQUENCE SET; Schema: public; Owner: fzkvjudcofublc
--

SELECT pg_catalog.setval('users_id_seq', 1, false);


--
-- Name: history history_pkey; Type: CONSTRAINT; Schema: public; Owner: fzkvjudcofublc
--

ALTER TABLE ONLY history
    ADD CONSTRAINT history_pkey PRIMARY KEY (id);


--
-- Name: journal journal_pkey; Type: CONSTRAINT; Schema: public; Owner: fzkvjudcofublc
--

ALTER TABLE ONLY journal
    ADD CONSTRAINT journal_pkey PRIMARY KEY (id);


--
-- Name: users users_pkey; Type: CONSTRAINT; Schema: public; Owner: fzkvjudcofublc
--

ALTER TABLE ONLY users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);


--
-- Name: history history_entry_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: fzkvjudcofublc
--

ALTER TABLE ONLY history
    ADD CONSTRAINT history_entry_id_fkey FOREIGN KEY (entry_id) REFERENCES journal(id);


--
-- Name: journal journal_user_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: fzkvjudcofublc
--

ALTER TABLE ONLY journal
    ADD CONSTRAINT journal_user_id_fkey FOREIGN KEY (user_id) REFERENCES users(id);


--
-- Name: public; Type: ACL; Schema: -; Owner: fzkvjudcofublc
--

REVOKE ALL ON SCHEMA public FROM postgres;
REVOKE ALL ON SCHEMA public FROM PUBLIC;
GRANT ALL ON SCHEMA public TO fzkvjudcofublc;
GRANT ALL ON SCHEMA public TO PUBLIC;


--
-- Name: plpgsql; Type: ACL; Schema: -; Owner: postgres
--

GRANT ALL ON LANGUAGE plpgsql TO fzkvjudcofublc;


--
-- PostgreSQL database dump complete
--

