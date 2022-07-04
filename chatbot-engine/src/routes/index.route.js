const express = require("express");
const router = express.Router();

const chatbot = require("./chatbot.route");

router.post("/post-test", (req, res) => {
  console.log("Got body:", req.body);
  res.sendStatus(200);
});

router.use("/message", chatbot);

router.get("/", (req, res) => res.send("Sample Node API Version1"));

router.get("/health", (req, res) => {
  const healthcheck = {
    uptime: process.uptime(),
    message: "OK",
    timestamp: Date.now(),
  };
  res.send(JSON.stringify(healthcheck));
});

module.exports = router;
